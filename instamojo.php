<?php
// Replace with your database credentials
$host = "localhost";
$dbname = "application_form";
$username = "root";
$password = "";

try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Your SELECT query to fetch user information from database
    $query = "SELECT name, email, mobile FROM info WHERE id = :user_id";

    // Get user ID from query parameters ($_GET['id'])
    $user_id = $_GET['id'];

    // Prepare the query
    $stmt = $pdo->prepare($query);

    // Bind the user_id parameter
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    // Fetch the result as an associative array
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user information was found in the database
    if ($user_info) {
        // Set your API key and auth token
        $api_key = "test_c6f60279b5307a963ab19acaede";
        $auth_token = "test_c927ff46baaaf11b33abaca7447";

        // API endpoint for Instamojo payment request
        $endpoint = "https://test.instamojo.com/api/1.1/payment-requests/";

        // Set the Instamojo request parameters
        $request_params = array(
            "purpose" => "Payment For Registration",
            "amount" => "2350.00",
            "buyer_name" => $user_info['name'],
            "email" => $user_info['email'],
            "phone" => $user_info['mobile'],
            "send_email" => true,
            "send_sms" => true,
            "redirect_url" => "http://localhost/wiz_js/view_data.php",
        );

        // Set the headers and authentication
        $headers = array(
            "X-Api-Key: " . $api_key,
            "X-Auth-Token: " . $auth_token,
            "Content-Type: application/x-www-form-urlencoded",
        );

        // Create the request body
        $request_body = http_build_query($request_params);

        // Set stream context options
        $opts = array(
            'http' => array(
                'method' => 'POST',
                'header' => implode("\r\n", $headers),
                'content' => $request_body,
            ),
        );

        // Create the stream context
        $context = stream_context_create($opts);

        // Make the API request
        $response = file_get_contents($endpoint, false, $context);

        // Check if the response was successful
        if ($response === false) {
            echo "Error: Unable to connect to Instamojo API";
        } else {
            // Process the API response (usually in JSON format)
            $response_data = json_decode($response, true);

            // You can handle the response data here
            print_r($response_data);

            // Check if the payment was successful
            if (isset($response_data['success']) && $response_data['success'] === true) {
                // Payment is successful, extract the payment ID from the API response
                $payment_id = $response_data['payment_request']['id']; // Extract the payment ID from the API response
                $payment_status = $response_data['payment_request']['status'];
                $payment_amount = $response_data['payment_request']['amount'];
                $long_url = $response_data['payment_request']['longurl'];

                try {
                    // Insert payment information into the "payment" table
                    $insert_query = "INSERT INTO payment (payment_id, name, email, phone, amount) 
                                     VALUES (:payment_id, :name, :email, :phone, :amount)";
                    $stmt_insert = $pdo->prepare($insert_query);

                    // Bind parameters for the INSERT query
                    $stmt_insert->bindParam(':payment_id', $payment_id, PDO::PARAM_STR);
                    $stmt_insert->bindParam(':name', $user_info['name'], PDO::PARAM_STR);
                    $stmt_insert->bindParam(':email', $user_info['email'], PDO::PARAM_STR);
                    $stmt_insert->bindParam(':phone', $user_info['mobile'], PDO::PARAM_STR);
                    $stmt_insert->bindParam(':amount', $payment_amount, PDO::PARAM_STR);

                    $stmt_insert->execute();
                    header("Location: " . $long_url);
            exit;

                    echo "Payment information inserted into the database. Payment ID: " . $payment_id;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Payment was not successful.";
            }
        }
    } else {
        echo "User information not found in the database.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

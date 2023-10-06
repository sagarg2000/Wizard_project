
<?php 
$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM info where id='".$_GET['id']."'"));
$data=$row['ssc_exam'];
echo "badhsdhfh";
?>

                <div class="wizard-inner">
                    
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" id="presentation">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Profile" style="margin-right:160px">
                                <span class="round-tab"  >
                                    <i class="glyphicon glyphicon-folder-open" style="font-size: 16px;"></i>&nbsp;Profile
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled" id="presentation">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Academic" style="margin-right:160px">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-pencil" style="font-size: 16px;"></i>&nbsp;Academic
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled" id="presentation">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Document" style="margin-right:160px">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-picture" style="font-size: 16px;"></i>&nbsp;Document
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled" id="presentation">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Finish" style="margin-right:160px">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok" style="font-size: 16px;"></i>&nbsp;Finish
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1" style="line-height: 20px;">
                            <h3>Contact Details:</h3>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Full Name:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name"  value="<?php echo $row['name']; ?>" required>
                                  </div>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="fname">Father's Name:</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="fname" placeholder="Enter Father Name" value="<?php echo $row['father_name']; ?>" name="fname">
                                    </div>
                                    <label class="control-label col-sm-2" for="mname">Mother's Name:</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="mname" placeholder="Enter Mother Name" value="<?php echo $row['mother_name']; ?>" name="mname">
                                    </div>
                                  </div>&nbsp;&nbsp;
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="gender">Gender:</label>
                                    <div>
                                        <div class="col-md-4">
                                    <label class="radio-inline">
                                     <input type="radio" name="gender" value="male"<?php echo ($row['gender'] === 'male') ? 'checked' : ''; ?>> Male
                                    </label>
                                    <label class="radio-inline">
                                     <input type="radio" name="gender" value="female"<?php echo ($row['gender'] === 'female') ? 'checked' : ''; ?>> Female
                                    </label>
                                </div>
                                    <label class="control-label col-sm-2" for="date">DOB:</label>
                                    <div class="col-sm-4">
                                      <input type="date" class="form-control" id="dob" placeholder="DD/MM/YYYY" name="dob" value="<?php echo $row['dob']; ?>">
                                    </div>
                                </div>
                                   </div>
                                   &nbsp;&nbsp;
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="email"><span style="color:red;">*</span>Email:</label>
                                    <div class="col-sm-4">
                                      <input type="email" class="form-control" id="email" name="to" placeholder="Enter email" required value="<?php echo $row['email']; ?>">
                                    </div>
                                    <label class="control-label col-sm-2" for="mobile"><span style="color:red;">*</span>Mobile:</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" min="0" maxlength="10" required value="<?php echo $row['mobile']; ?>">
                                    </div>
                                  </div>
                                  &nbsp;&nbsp;
                                  <table class="table table-bordered">
                                  <div class="col-md-12">
                                    <tr>
                                        <td style="width: 50%;">
                                    
                                        <h4>Permanant Address :</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="flat">House / Flat no:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address" placeholder="Enter Flat No" name="p_flat" value="<?php echo $row['p_house']; ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-4" for="street">Street:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address1" placeholder="Enter Street " name="p_street" value="<?php echo $row['p_street']; ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-4" for="city">City / Village:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address2" placeholder="City / Village" name="p_city" value="<?php echo $row['p_city']; ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-4" for="district">District:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address3" placeholder="Enter District " name="p_district" value="<?php echo $row['p_district']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="state">State:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address4" placeholder="Enter State " name="p_state" value="<?php echo $row['p_state']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="pincode">Pin Code:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address5" placeholder="Enter Pin Code " name="p_pincode" value="<?php echo $row['p_pin']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="country">Country:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="address6" placeholder="Enter Country " name="p_country" value="<?php echo $row['p_country']; ?>">
                                            </div>
                                        </div>

                                    
                                </td>
                                <td style="width: 50%;">
                                    
                                        <h4>Mailing Address :</h4>
                                        <input type="checkbox" name="checkbox" id="same_as_current" onclick="copyAddress()" value="Same as Permanant address"> <span>Same as Permanant address.</span>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="flat">House / Flat no:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address" placeholder="Enter Flat No" name="m_flat" value="<?php echo $row['m_house']; ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-4" for="street">Street:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address1" placeholder="Enter Street " name="m_street" value="<?php echo $row['m_street']; ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-4" for="city">City / Village:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address2" placeholder="City / Village" name="m_city" value="<?php echo $row['m_city']; ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-4" for="district">District:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address3" placeholder="Enter District " name="m_district" value="<?php echo $row['m_district']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="state">State:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address4" placeholder="Enter State " name="m_state" value="<?php echo $row['m_state']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="pincode">Pin Code:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address5" placeholder="Enter Pin Code " name="m_pincode" value="<?php echo $row['m_pin']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="country">Country:</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control" id="permanent_address6" placeholder="Enter Country " name="m_country" value="<?php echo $row['m_country']; ?>">
                                            </div>
                                        </div>
                                    
                                </td>
                                </tr>
                                  </div>
                                </table>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-primary next-step" >Save and continue</button></li>
                            </ul>
                        </div>
                        <!-- Acedemic Section -->
                        <div class="tab-pane" role="tabpanel" id="step2">
                             <h3>Academic:</h3>
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label class="control-label " for="document" style="font-size: 16px;"> <b>Select Document:</b></label>
                                </div>
                                <div class="form-group col-md-5">
                                    <select class="form-control" name="document" id="document" value="<?php echo $row['document']; ?>">
                                        <option value="Please Provide Any Document"> Please Provide Any Document</option>
                                        <option value="Aadhar Card"<?php echo ($row['document'] === 'Aadhar Card') ? 'selected' : ''; ?> name=""> Aadhar Card</option>
                                        <option value="Passport"<?php echo ($row['document'] === 'Passport') ? 'selected' : ''; ?>> Passport</option>
                                        <option value="Election Card"<?php echo ($row['document'] === 'Election Card') ? 'selected' : ''; ?>> Election Card</option>
                                        <option value="Driving License"<?php echo ($row['document'] === 'Driving License') ? 'selected' : ''; ?>> Driving License</option>
                                    </select>
                                   </div>
                                   <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="docu_no" name="docu_no" value="<?php echo $row['document_no']; ?>">
                                   </div>
                                   <div class="col-sm-12">
                                    <p style="font-size: 16px;">
                                        *Note : Aadhar Card Number is preferred option for linking your certification in Govt Record. 
                                    </p>
                                   </div>
                            </div><br>
                            <div class="form-group col-md-12">
                           <p style="font-size: 16px;"><b>Have you ever been debarred by any University/Board :  <label class="radio-inline">
                            <input type="radio" name="debarred" value="Yes"<?php echo ($row['debarred'] === 'Yes') ? 'checked' : ''; ?> ><b>Yes</b>
                           </label>
                           <label class="radio-inline">
                            <input type="radio" name="debarred" value="No"<?php echo ($row['debarred'] === 'No') ? 'checked' : ''; ?>> <b>No</b>
                           </label></b></p>
                            </div>
                            <div class="form-group col-md-12">
                                <p style="font-size: 16px;"><b>Category:  <label class="radio-inline">
                                 <input type="radio" name="Category" value="General"<?php echo ($row['category'] === 'General') ? 'checked' : ''; ?>><b>General</b>
                                </label>
                                <label class="radio-inline">
                                 <input type="radio" name="Category" value="SC"<?php echo ($row['category'] === 'SC') ? 'checked' : ''; ?>> <b>SC</b>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="Category" value="OBC"<?php echo ($row['category'] === 'OBC') ? 'checked' : ''; ?>> <b>OBC</b>
                                   </label>
                                   <label class="radio-inline">
                                    <input type="radio" name="Category" value="PH"<?php echo ($row['category'] === 'PH') ? 'checked' : ''; ?>> <b>PH</b>
                                   </label>
                                   <label class="radio-inline">
                                    <input type="radio" name="Category" value="Ex-Serviceman"<?php echo ($row['category'] === 'Ex-Serviceman') ? 'checked' : ''; ?>> <b>Ex-Serviceman</b>
                                   </label>
                                   <label class="radio-inline">
                                    <input type="radio" name="Category" value="Employed"<?php echo ($row['category'] === 'Employed') ? 'checked' : ''; ?>> <b>Employed</b>
                                   </label>
                                   <label class="radio-inline">
                                    <input type="radio" name="Category" value="Unemployed"<?php echo ($row['category'] === 'Unemployed') ? 'checked' : ''; ?>> <b>Unemployed</b> &nbsp;Others
                                   </label></b></p>
                                 </div>
                                 <div class="col-md-12">
                                        <p style="font-size: 16px;"><b>Details of Previous Examination Passed From Other University</b></p>
                                        <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Level</th>
                                            <th>Board / Univ</th>
                                            <th>Program</th>
                                            <th>year of Passing</th>
                                            <th>Percentage</th>
                                            <th>Division</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                               
                                                ?>
                                                <td class="col-md-2"> <p>10th Std</p></td>
                                                <td> <input type="text" class="form-control col-md-2" name="10th_uni" id="10th_uni" placeholder="RTMNU" value="<?php echo $row['10th_uni'];?>"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="10th_pro" id="10th_pro" value="<?php echo $row['10th_pro'] ;?>"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="10th_pass" id="10th_pass" value="<?php echo $row['10th_pass'] ;?>"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="10th_percentage" id="10th_percentage" value="<?php echo $row['10th_percentage'] ;?>"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="10th_divison" id="10th_divison" value="<?php echo $row['10th_divison'] ;?>"></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"> <p>12th Std</p></td>
                                                <td> <input type="text" class="form-control col-md-2" name="12th_uni" id="12th_uni" placeholder="12th Board" ></td>
                                                <td> <input type="text" class="form-control col-md-2" name="12th_pro" id="12th_pro"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="12th_pass" id="12th_pass"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="12th_percentage" id="12th_percentage"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="12th_divison" id="12th_divison"></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"> <p>Graduation</p></td>
                                                <td> <input type="text" class="form-control col-md-2" name="graduation" id="graduation" placeholder="Graduation University"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="gra_pro" id="gra_pro"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="gra_pass" id="gra_pass"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="gra_percentage" id="gra_percentage"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="gra_divison" id="gra_divison"></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"> <p>Post Graduation</p></td>
                                                <td> <input type="text" class="form-control col-md-2" name="pg_uni" id="pg_uni" placeholder="Post Graduation University"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="pg_pro" id="pg_pro"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="pg_pass" id="pg_pass"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="pg_percentage" id="pg_percentage"></td>
                                                <td> <input type="text" class="form-control col-md-2" name="pg_divison" id="pg_divison"></td>
                                            </tr> 
                                                                                
                                        </tbody>
                                        <!-- <div class="col-md-12">
                                            <div class="form-group col-md-4">
                                                    <p>Place: </p>                                            
                                                </div>
                                                <div class="form-group col-md-4">                                                
                                                    <input type="text" class="form-control">                                                
                                                 </div>
                                                 <divclass="col-md-4"></div>                                              
                                            </div> -->
                                        </table>
                                                                       </div>
                          
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <!-- Document Upload Section -->
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <h3 style="font-size: 20px;border-bottom: 1px solid;">Upload Photograph And Signature And Documents</h3>
                            <table class="table table-border-bottom" style="font-size: medium;">
                                <thead>
                                    <tr>
                                        <th>sr no</th>
                                        <th>Document Type</th>
                                        <th>Status</th>
                                        <th>Attestation Required</th>
                                        <th>Upload</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><p>1</p></td>
                                        <td><p>Photograph <br>125px X 130px</p></td>
                                        <td><button type="button" class="btn btn-danger" name="" id="statusBtn">Upload Pending</button></td>
                                        <td><button type="button" class="btn btn-primary" name="" id="">Not Required</button></td>
                                        <td><input type="file" name="image" id="image" class="form-control col-md-2"   onchange="updateStatus()">  </td>
                                        <td><div id="displayDocument"><img src="uploads/<?php echo $row['photograph'];?>"  height="100px" width="100px"></div></td>
                                    </tr>
                                    <tr>
                                        <td><p>2</p></td>
                                        <td><p>Signature <br>50px X 70px</p></td>
                                        <td><button type="button" class="btn btn-danger" name="" id="statusBtn1">Upload Pending</button></td>
                                        <td><button type="button" class="btn btn-primary" name="" id="">Not Required</button></td>
                                        <td><input type="file" name="image1" id="image1" class="form-control col-md-2" onchange="updateStatus1()"></td>
                                        <td><div id="displayDocument1"><img src="uploads/<?php echo $row['signature'];?>"  height="100px" width="100px"></div></td>
                                    </tr>
                                    <tr>
                                        <td><p>3</p></td>
                                        <td><p>Identify Proof <br>125px X 130px</p></td>
                                        <td><button type="button" class="btn btn-danger" name="" id="statusBtn2">Upload Pending</button></td>
                                        <td><button type="button" class="btn btn-danger" name="" id=""> Required</button></td>
                                        <td><input type="file" name="image2" id="image2" class="form-control col-md-2" onchange="updateStatus2()"></td>
                                        <td><div id="displayDocument2"><img src="uploads/<?php echo $row['id_proof'];?>"  height="100px" width="100px"></div></td>
                                    </tr>
                                    <tr>
                                        <td><p>4</p></td>
                                        <td><p>Address Proof <br>125px X 130px</p></td>
                                        <td><button type="button" class="btn btn-danger" name="" id="statusBtn3">Upload Pending</button></td>
                                        <td><button type="button" class="btn btn-primary" name="" id="">Not Required</button></td>
                                        <td><input type="file" name="image3" id="image3" class="form-control col-md-2"  onchange="updateStatus3()"></td>
                                        <td><div id="displayDocument3"><img src="uploads/<?php echo $row['ad_proof'];?>"  height="100px" width="100px"></div></td>
                                    </tr>
                                    <tr>
                                        <td><p>5</p></td>
                                        <td><p>Qualification Document <br>(Marksheet/Degree) <br>[Self Attested] <br>125px X 130px</p></td>
                                        <td><button type="button" class="btn btn-danger" name="" id="statusBtn4">Upload Pending</button></td>
                                        <td><button type="button" class="btn btn-danger" name="" id=""> Required</button></td>
                                        <td><input type="file" name="image4" id="image4" class="form-control col-md-2"  onchange="updateStatus4()"></td>
                                        <td><div id="displayDocument4"><img src="uploads/<?php echo $row['qualification_proof'];?>" height="100px" width="100px"></div></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <h3 style="text-align: center;" id="excel">Excellent You Complete All The Steps...!</h3>
                            <div class="col-md-12">
                                <div class="col-md-8 col-md-offset-2">
<h5 style="font-size: 25px; font-family: serif;" id="submission">Your submission has been uploaded and is ready to be sent. You may go back to review and adjust any of the information you have entered before continuing . When you are ready, click "Finish Submission".</p>
</div> </div>
<ul class="list-inline pull-right">
    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
    <li><button type="submit" class="btn btn-primary btn-info-full next-step" name="final_sub" >Finish Submission</button></li>
</ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>

<!-- Modal Section -->
  
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="upload.js"></script> -->


<script>
 function copyAddress() {
  const sameAsCurrentCheckbox = document.getElementById('same_as_current');
  const addressInput = document.getElementById('address');
  const permanentAddressInput = document.getElementById('permanent_address');
  const addressInput1 = document.getElementById('address1');
  const permanentAddressInput1 = document.getElementById('permanent_address1');
  const addressInput2 = document.getElementById('address2');
  const permanentAddressInput2 = document.getElementById('permanent_address2');
  const addressInput3 = document.getElementById('address3');
  const permanentAddressInput3 = document.getElementById('permanent_address3');
  const addressInput4 = document.getElementById('address4');
  const permanentAddressInput4 = document.getElementById('permanent_address4');
  const addressInput5 = document.getElementById('address5');
  const permanentAddressInput5 = document.getElementById('permanent_address5');
  const addressInput6 = document.getElementById('address6');
  const permanentAddressInput6 = document.getElementById('permanent_address6');

  if (sameAsCurrentCheckbox.checked) {

    permanentAddressInput.value = addressInput.value;
    permanentAddressInput1.value = addressInput1.value;
    permanentAddressInput2.value = addressInput2.value;
    permanentAddressInput3.value = addressInput3.value;
    permanentAddressInput4.value = addressInput4.value;
    permanentAddressInput5.value = addressInput5.value;
    permanentAddressInput6.value = addressInput6.value;
    
    // permanentAddressInput.disabled = true;
    // permanentAddressInput1.disabled = true;
    // permanentAddressInput2.disabled = true;
    // permanentAddressInput3.disabled = true;
    // permanentAddressInput4.disabled = true;
    // permanentAddressInput5.disabled = true;
    // permanentAddressInput6.disabled = true;

  } else {
    
    permanentAddressInput.value = '';
    permanentAddressInput1.value = '';
    permanentAddressInput2.value = '';
    permanentAddressInput3.value = '';
    permanentAddressInput4.value = '';
    permanentAddressInput5.value = '';
    permanentAddressInput6.value = '';

    // permanentAddressInput.disabled = false;
    // permanentAddressInput1.disabled = false;
    // permanentAddressInput2.disabled = false;
    // permanentAddressInput3.disabled = false;
    // permanentAddressInput4.disabled = false;
    // permanentAddressInput5.disabled = false;
    // permanentAddressInput6.disabled = false;

  }
}
</script>
<script>
 function updateStatus() {
    var fileInput = document.getElementById("image");
    var statusButton = document.getElementById("statusBtn");
    var validExtensions = ["jpeg", "jpg", "png", "jfif"];
    var maxSize = 1024 * 1024; // Maximum file size in bytes (1MB)
    var maxDimensions = 300; // Maximum dimensions (width or height)

    if (fileInput.files && fileInput.files[0]) {
        var file = fileInput.files[0];
        var extension = file.name.split('.').pop().toLowerCase();

        if (validExtensions.indexOf(extension) === -1) {
            alert("Please select a valid JPEG, PNG, or JFIF file.");
            fileInput.value = "";
            return;
        }

        if (file.size > maxSize) {
            alert("File size exceeds 1MB. Please choose a smaller file.");
            fileInput.value = "";
            return;
        }

        var img = new Image();
        img.onload = function() {
            if (this.width > maxDimensions || this.height > maxDimensions) {
                alert("Please select an image with dimensions strictly under 300px X 300px.");
                fileInput.value = "";
            } else {
                statusButton.innerHTML = "Uploaded";
                statusButton.classList.replace("btn-danger", "btn-success");
                displayImagePreview(img);
            }
        };
        img.src = URL.createObjectURL(file);
    } else {
        statusButton.innerHTML = "Upload Pending";
        statusButton.classList.replace("btn-success", "btn-danger");
        displayDocumentDiv.innerHTML = "";
    }
}

function displayImagePreview(image) {
    var displayDocumentDiv = document.getElementById("displayDocument");
    displayDocumentDiv.innerHTML = "";

    var imagePreview = new Image();
    imagePreview.onload = function() {
        imagePreview.style.maxWidth = "100px";
        imagePreview.style.maxHeight = "100px";
        displayDocumentDiv.appendChild(imagePreview);
    };
    imagePreview.src = image.src;
}



function updateStatus1() {
    var fileInput = document.getElementById("image1");
    var statusButton = document.getElementById("statusBtn1");
    var validExtensions = ["jpeg", "jpg", "png", "jfif"];
    var maxSize = 1024 * 1024; // Maximum file size in bytes (1MB)
    var maxDimensions = 300; // Maximum dimensions (width or height)

    if (fileInput.files && fileInput.files[0]) {
        var file = fileInput.files[0];
        var extension = file.name.split('.').pop().toLowerCase();

        if (validExtensions.indexOf(extension) === -1) {
            alert("Please select a valid JPEG, PNG, or JFIF file.");
            fileInput.value = "";
            return;
        }

        if (file.size > maxSize) {
            alert("File size exceeds 1MB. Please choose a smaller file.");
            fileInput.value = "";
            return;
        }

        var img = new Image();
        img.onload = function() {
            if (this.width > maxDimensions || this.height > maxDimensions) {
                alert("Please select an image with dimensions strictly under 300px X 300px.");
                fileInput.value = "";
            } else {
                statusButton.innerHTML = "Uploaded";
                statusButton.classList.replace("btn-danger", "btn-success");
                displayImagePreview1(img);
            }
        };
        img.src = URL.createObjectURL(file);
    } else {
        statusButton.innerHTML = "Upload Pending";
        statusButton.classList.replace("btn-success", "btn-danger");
        displayDocumentDiv.innerHTML = "";
    }
}

function displayImagePreview1(image) {
    var displayDocumentDiv = document.getElementById("displayDocument1");
    displayDocumentDiv.innerHTML = "";

    var imagePreview = new Image();
    imagePreview.onload = function() {
        imagePreview.style.maxWidth = "100px";
        imagePreview.style.maxHeight = "100px";
        displayDocumentDiv.appendChild(imagePreview);
    };
    imagePreview.src = image.src;
}

function updateStatus2() {
    var fileInput = document.getElementById("image2");
    var statusButton = document.getElementById("statusBtn2");
    var validExtensions = ["jpeg", "jpg", "png", "jfif"];
    var maxSize = 1024 * 1024; // Maximum file size in bytes (1MB)
    var maxDimensions = 300; // Maximum dimensions (width or height)

    if (fileInput.files && fileInput.files[0]) {
        var file = fileInput.files[0];
        var extension = file.name.split('.').pop().toLowerCase();

        if (validExtensions.indexOf(extension) === -1) {
            alert("Please select a valid JPEG, PNG, or JFIF file.");
            fileInput.value = "";
            return;
        }

        if (file.size > maxSize) {
            alert("File size exceeds 1MB. Please choose a smaller file.");
            fileInput.value = "";
            return;
        }

        var img = new Image();
        img.onload = function() {
            if (this.width > maxDimensions || this.height > maxDimensions) {
                alert("Please select an image with dimensions strictly under 300px X 300px.");
                fileInput.value = "";
            } else {
                statusButton.innerHTML = "Uploaded";
                statusButton.classList.replace("btn-danger", "btn-success");
                displayImagePreview2(img);
            }
        };
        img.src = URL.createObjectURL(file);
    } else {
        statusButton.innerHTML = "Upload Pending";
        statusButton.classList.replace("btn-success", "btn-danger");
        displayDocumentDiv.innerHTML = "";
    }
}

function displayImagePreview2(image) {
    var displayDocumentDiv = document.getElementById("displayDocument2");
    displayDocumentDiv.innerHTML = "";

    var imagePreview = new Image();
    imagePreview.onload = function() {
        imagePreview.style.maxWidth = "100px";
        imagePreview.style.maxHeight = "100px";
        displayDocumentDiv.appendChild(imagePreview);
    };
    imagePreview.src = image.src;
}


function updateStatus3() {
    var fileInput = document.getElementById("image3");
    var statusButton = document.getElementById("statusBtn3");
    var validExtensions = ["jpeg", "jpg", "png", "jfif"];
    var maxSize = 1024 * 1024; // Maximum file size in bytes (1MB)
    var maxDimensions = 300; // Maximum dimensions (width or height)

    if (fileInput.files && fileInput.files[0]) {
        var file = fileInput.files[0];
        var extension = file.name.split('.').pop().toLowerCase();

        if (validExtensions.indexOf(extension) === -1) {
            alert("Please select a valid JPEG, PNG, or JFIF file.");
            fileInput.value = "";
            return;
        }

        if (file.size > maxSize) {
            alert("File size exceeds 1MB. Please choose a smaller file.");
            fileInput.value = "";
            return;
        }

        var img = new Image();
        img.onload = function() {
            if (this.width > maxDimensions || this.height > maxDimensions) {
                alert("Please select an image with dimensions strictly under 300px X 300px.");
                fileInput.value = "";
            } else {
                statusButton.innerHTML = "Uploaded";
                statusButton.classList.replace("btn-danger", "btn-success");
                displayImagePreview3(img);
            }
        };
        img.src = URL.createObjectURL(file);
    } else {
        statusButton.innerHTML = "Upload Pending";
        statusButton.classList.replace("btn-success", "btn-danger");
        displayDocumentDiv.innerHTML = "";
    }
}

function displayImagePreview3(image) {
    var displayDocumentDiv = document.getElementById("displayDocument3");
    displayDocumentDiv.innerHTML = "";

    var imagePreview = new Image();
    imagePreview.onload = function() {
        imagePreview.style.maxWidth = "100px";
        imagePreview.style.maxHeight = "100px";
        displayDocumentDiv.appendChild(imagePreview);
    };
    imagePreview.src = image.src;
}

function updateStatus4() {
    var fileInput = document.getElementById("image4");
    var statusButton = document.getElementById("statusBtn4");
    var validExtensions = ["jpeg", "jpg", "png", "jfif"];
    var maxSize = 1024 * 1024; // Maximum file size in bytes (1MB)
    var maxDimensions = 300; // Maximum dimensions (width or height)

    if (fileInput.files && fileInput.files[0]) {
        var file = fileInput.files[0];
        var extension = file.name.split('.').pop().toLowerCase();

        if (validExtensions.indexOf(extension) === -1) {
            alert("Please select a valid JPEG, PNG, or JFIF file.");
            fileInput.value = "";
            return;
        }

        if (file.size > maxSize) {
            alert("File size exceeds 1MB. Please choose a smaller file.");
            fileInput.value = "";
            return;
        }

        var img = new Image();
        img.onload = function() {
            if (this.width > maxDimensions || this.height > maxDimensions) {
                alert("Please select an image with dimensions strictly under 300px X 300px.");
                fileInput.value = "";
            } else {
                statusButton.innerHTML = "Uploaded";
                statusButton.classList.replace("btn-danger", "btn-success");
                displayImagePreview4(img);
            }
        };
        img.src = URL.createObjectURL(file);
    } else {
        statusButton.innerHTML = "Upload Pending";
        statusButton.classList.replace("btn-success", "btn-danger");
        displayDocumentDiv.innerHTML = "";
    }
}

function displayImagePreview4(image) {
    var displayDocumentDiv = document.getElementById("displayDocument4");
    displayDocumentDiv.innerHTML = "";

    var imagePreview = new Image();
    imagePreview.onload = function() {
        imagePreview.style.maxWidth = "100px";
        imagePreview.style.maxHeight = "100px";
        displayDocumentDiv.appendChild(imagePreview);
    };
    imagePreview.src = image.src;
}



</script>
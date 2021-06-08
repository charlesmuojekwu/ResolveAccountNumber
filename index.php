
<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Member Area</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp" style="background-image: url('../images/reg0.png');background-size:100% ">    
       <header class="panel-heading text-center">
        </header>
 <form action="register" method="post" class="panel-body wrapper-lg" >


<div class="form-group">
            <label class="control-label">Username</label>
            <input type="text" placeholder="Username" name="username" required class="form-control input-lg">
            <small>(Note : Avoid adding space between your username) </small>
          </div>
    
 <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" id="inputPassword" placeholder="Password" required name="password" class="form-control input-lg">
          </div>

<div class="form-group">
            <label class="control-label"> Confirm Password</label>
            <input type="password" id="inputPassword" placeholder="ReType Password" required name="cpassword" class="form-control input-lg">
          </div>
           <div class="line line-dashed"></div>
   
<div class="form-group">
            <label class="control-label">Email Address</label>
            <input type="email" placeholder="Enter Valid Email" name="email" required class="form-control input-lg">
          </div>

<div class="form-group">
            <label class="control-label">Phone Number</label>
            <input type="text" placeholder="Note : You would verify your line" name="phone" required class="form-control input-lg" >
          </div>

<div class="form-group">
            <label class="control-label">Sponsor / Upline Username</label>
            <input type="text" placeholder="Your Upline (Optional)" name="referer" value="<?php if(isset($_GET['ref'])){ echo $_GET['ref']; }else{ ''; } ?>" class="form-control input-lg" readonly>
          </div>

          <div class="line line-dashed"></div>

<!--<div class="form-group">
            <label class="control-label">Bitcoin Address</label>
            <input type="text" placeholder="Your Bitcoin Wallet Address" name="bitcoin" class="form-control input-lg">
          </div>-->

<div class="form-group">
            <label class="control-label">Bank Name</label>
            <select name="bank" id="bankcodes" class="form-control input-lg" required>
                <option hidden="" value="">Select Bank</option>
                <option data-code="044" value="Access Bank">Access Bank</option>
                <option data-code="023" value="Citibank">Citibank</option>
                <option data-code="063" value="Access(Diamond) Bank">Access (Diamond) Bank</option>
                <option data-code="050" value="Ecobank Nigeria">Ecobank Nigeria</option>
                <option data-code="070" value="Fidelity Bank Nigeria">Fidelity Bank Nigeria</option>
                <option data-code="011" value="First Bank of Nigeria">First Bank of Nigeria</option>
                <option data-code="214" value="First City Monument Bank">First City Monument Bank</option>
                <option data-code="058" value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                <option data-code="030" value="Heritage Bank Plc">Heritage Bank Plc</option>
                <option data-code="301" value="Jaiz Bank">Jaiz Bank</option>
                <option data-code="082" value="Keystone Bank Limited">Keystone Bank Limited</option>
                <option data-code="101" value="Providus Bank Plc">Providus Bank Plc</option>
                <option data-code="076" value="Polaris Bank">Polaris Bank</option>
                <option data-code="221" value="Stanbic IBTC Bank Nigeria Limited">Stanbic IBTC Bank Nigeria Limited</option>
                <option data-code="068" value="Standard Chartered Bank">Standard Chartered Bank</option>
                <option data-code="232" value="Sterling Bank">Sterling Bank</option>
                <option data-code="100" value="Suntrust Bank Nigeria Limited">Suntrust Bank Nigeria Limited</option>
                <option data-code="032" value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                <option data-code="033" value="United Bank for Africa">United Bank for Africa</option>
                <option data-code="215" value="Unity Bank Plc">Unity Bank Plc</option>
                <option data-code="035" value="Wema Bank">Wema Bank</option>
                <option data-code="057" value="Zenith Bank">Zenith Bank</option>
        </select>
            
          </div>

<div class="form-group">
            <label class="control-label">Account number</label>
            <input type="text" id="AccNumber" placeholder="Account number (10 digits)" name="norek" class="form-control input-lg" required>
            <small id="noAccount" style="display:none;color:red">Account Number Does Not Exist In The Bank you selected</small>
          </div>    
    
<div class="form-group">
            <label class="control-label">Account Name</label>
            <input type="text" placeholder="Account holder Name" name="nama" id="accName" class="form-control input-lg" required > <p id="fetch" style="display:none;font-size:20px">Fetching Account Name</p>
          </div>



<hr>

<!--<div class="form-group pull-left">
<img src="captcha.php" />

            </div>
            <div class="form-group pull-right">
                <div class="input-icon right"><input type="text" placeholder="Captcha" name="captcha" class="form-control" required></div>
            </div>-->


          
          <button type="submit" class="btn btn-secondary1 btn-lg">Register</button>
          <div class="line line-dashed"></div>
          
          <p class="text-muted text-center"><small>Login to Your account?</small></p>
          <a href="login" class="btn btn-default btn-block">Login account</a>
<a href="recover" class="btn btn-warning btn-block">Reset Password</a>
  </form>
   
  
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
     
    </div>
  </footer>
  <!-- / footer -->
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

<script>
$('#AccNumber').focusout(function() {
var bankcode=$('#bankcodes').find(':selected').attr('data-code');
var account=$('#AccNumber').val();
$('#accName').hide();     
$('#fetch').show();     
     
     
$.ajax({
  url: "getaccount.php",
  type: "get", //send it through get method
  data: { 
    bankCode: bankcode, 
    accNum: account
  },
  success: function(response) {
    console.log(response);
    if(response=='failed'){
        $('#accName').show();     
        $('#fetch').hide();
        $('#accName').hide();
        $('#noAccount').show();
    }else{
        $('#accName').show();     
        $('#accName').val(response);     
        $('#fetch').hide(); 
        $('#noAccount').hide();
        $('#accName').attr('readonly','readonly');
    }
  },
  error: function(xhr) {
    //Do Something to handle error
  }
});

}); 

 $('#bankcodes').change(function() {
 $('#accName').val('');
 $('#AccNumber').val('');
});   
</script>
  


</body>
</html>
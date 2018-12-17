<?php
$errors = new Errors_Show();
class Errors_Show{
    public function __construct(){
        if(isset($_GET['msg']) && $_GET['msg'] == "oopser21%?"){
            ?>
                <div class="alert alert-warning" id="error">...Opps Error ! -- Try Again</div>
            <?php
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "error1"){
            ?>
                <div class="alert alert-warning" id="error">All Fieldset Are Required ! -- Try Again</div>
            <?php
            // if one of the field or all of the field is empty 
                        
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "error3467%"){
            ?>
                <div class="alert alert-warning" id="error">Invalid Email ! -- Try Again</div>
            <?php
            // Check for Valid Email
                        
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "password\"21321ef76%"){
            ?>
            <div class ="alert alert-warning" id="error">Password Doesn't Match! -- Try Again ! </div>
            <?php
            //flags this error if password and confirm-password not correct!
        }
        if(isset($_GET['msg']) && $_GET['msg'] =="num21321ef76%"){
            ?>
           <div class ="alert alert-warning" id="error">Invalid Number ! -- Try Again ! </div>
           <?php
           //users havve to agree to the term of use
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "error12"){
            ?>
                <div class ="alert alert-warning" id ="error"> Username Or Password Weak ! -- Try Again ! </div>
            <?php
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "error1567%"){
            ?>
                <div class ="alert alert-warning" id ="error">Inavlid Username Or Password Character ! -- Try Again ! </div>
            <?php
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "passerr_634%"){
            ?>
                <div class="alert alert-warning" id="error">Your Number Can Be Easily Guesssed, Try Another ! -- Try Again</div>
            <?php
            //Caant Pick ur Number
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "passerr_6e%"){
            ?>
                <div class="alert alert-warning" id="error">Username or Mobile And Password Cannot Be The Same ! -- Try Again</div>
            <?php
            // username and password cannot be the same
        }
        if(isset($_GET['msg']) && $_GET['msg'] =="policy\"21321ef76%"){
            ?>
           <div class ="alert alert-warning" id="error">Agree To Our Term of Use ! -- Try Again ! </div>
           <?php
           //users havve to agree to the term of use
        }
        if(isset($_GET['msg']) && $_GET['msg'] =="registerERR?"){
            ?>
           <div class ="alert alert-info" id="error">U Alredy Have An Apartment Approved! -- Try Login To Continue ! </div>
           <?php
           //Checks if User Alredy Exists, Flags This Error if True
        }
        if(isset($_GET['msg']) && $_GET['msg'] =="logERR?"){
            ?>
           <div class ="alert alert-Danger" id="error">User Doesnt Exist! -- Register Now To Continue ! </div>
           <?php
           //Checks if User Alredy Exists, Flags This Error if false, this checks in Logining
        }
        if(isset($_GET['msg']) && $_GET['msg'] =="passwERR?"){
            ?>
           <div class ="alert alert-warning" id="error">Incorrect Password! -- Try Again! </div>
           <?php
           //Checks if User Alredy Exists, Flags This Error if True
        }
        if(isset($_GET['error'] )){
          ?>
            <script>
                (function($){
                   $(document).ready(function(){
                        $('#myModal').removeClass('fade');
                        $('#myModal').addClass('show');
                        $('#user_first_name, #user_last_name, #user_dob, #user_sex').addClass('error_show');
                        $('.test').addClass('avartar');
                        //$('#user_first_name').addCustomValidity('here');
                        // $('#user_last_name').addClass('error_show');
                        $('#close').click(function(){
                            $('#myModal').addClass('fade');
                            $('#myModal').removeClass('show');
                            $('#user_first_name, #user_last_name, #user_dob, #user_sex').removeClass('error_show');
                            $('.test').removeClass('avartar');
                            $('#user_first_name, #user_last_name, #user_dob').val("");
                        // $('window').load();
                        });

                    })
                })(jQuery)
            </script>
            
            
   <?php
            
    }
    if(isset($_GET['error1'])){
        ?>
            <script>
                (function($){
                   $(document).ready(function(){
                        $('#myModal').removeClass('fade');
                        $('#myModal').addClass('show');
                        $('#test1').addClass('avartar');
                        $('#close').click(function(){
                            $('#myModal').addClass('fade');
                            $('#myModal').removeClass('show');
                            $('#test1').removeClass('avartar')
                        });
                    })
                })(jQuery)   
            </script>
        <?php
    }
    if(isset($_GET['rrr'])){
        ?>
       <div class ="alert alert-warning" style="text-align:center; font-size:15px;color:black;" >Error Uploading Your Image Try Ensure you in the right format(png/jpg/jpeg) and right image size and Dimention.<br> NOTICE: All Fields Are Required</div>
       <?php
       //ERROR IN IMAGE UPLOAD FROM ADMIN TO USER VIEW
    }
    if(isset($_GET['ERrrr'])){
        ?>
       <div class ="alert alert-warning" style="text-align:center; font-size:15px;color:black;" >CHANGING CAPTION FAILED</div> 
       <?php
       //CHANGING SLIDER CAPTION FAILED
    }
    if(isset($_GET['error34567%4'])){
        ?>
            <script>
                (function($){
                    $(document).ready(function(){
                        $('#myModal1').removeClass('fade');
                        $('#myModal1').addClass('show');

                        $('#closey').click(function(){
                            $('#myModal1').addClass('fade');
                            $('#myModal1').removeClass('show');
                        });
                        $('#open').click(function(){
                            $('#myModal1').addClass('fade');
                            $('#myModal1').removeClass('show');
                            $('#myModal').removeClass('fade');
                            $('#myModal').addClass('show');
                            $('#close').click(function(){
                                $('#myModal').addClass('fade');
                                $('#myModal').removeClass('show');
                            });
                        })
                    })
                })(jQuery)
            </script>
        <?php
    }
        //This is a sucess message Displayed to a user after update to profile is succeded
    if($_SESSION['next_of_kin_name']!= null){
        ?>
            <script>
                (function($){
                    $(document).ready(function(){
                        // $('#myModal11').removeClass('fade');
                        // $('#myModal11').addClass('show');
                        // $('#myModal11').addClass('fade');
                        // setTimeout(300);
                    })
                })(jQuery)
            </script>
        <?php
        }
}
}

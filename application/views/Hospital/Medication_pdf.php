<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
    <!-- top right bottom left -->
    <style>
     
         @page {
            margin: -10px 35px 0px 35px !important;  
           
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;
            src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
        }
         body {
        max-width: 100%;
        padding: 2%;
        font-family: system-ui;
        }

    .float{
        float: left;
    }

    .img img{
       width: 100px;
       margin-left:70px;
    }

    .img{
      
    }

    .text{
       
        text-align: left;
        pad
    }

    .text p{
        font-size: 14px;
        color: #959595;
    }

    p{
        font-size: 14px;
        color: black;
    }

    .text h3{
        margin: 0px;
    }

    .border_buttom{
        border-bottom: 2px solid #000;
        height: 140px;
   
    }

    .border_buttom2{
        border-bottom: 2px solid #000;
             
           padding-bottom : 500px !important;
   
    }

    .border-0{
        border-right: 0px !important;
    }

    .border-02{
        border-left: 0px !important;
        text-align:left;
        padding-left: 15px;
    }

    .border-01{
        border-bottom: 0px !important;
    }

    .present-deatils{

    }

    .present-deatils .heading{
        margin-bottom:-20px;
    }

    table{
        width: 100%;
         border-bottom: 2px solid #000;
        border-spacing: 0;
        margin-bottom: 30px;
        margin-top:130px;
    }

    .head{
        border: none !important; 
        margin-top:0px !important;
      
    }

    .head th,td{
         border: none !important; 
    }

  table th{
         border-right: 2px solid #000;
        border-bottom: 2px solid #000;
        border-left: 2px solid #000;
        padding: 0px 0px;
    }

    table td{
        border-right: 2px solid #000;
        padding: 5px 0px;
         border-bottom: 2px solid #000;
     } 

    table h4{
        font-size:12px;
    }

    table p{
        font-size:12px;
    } 

    .deatils{
         float: left;
         font-size: 12px;
    }

    .deatils-01{
         float: right;
         font-size: 14px;
         
    }

    .deatils  h4{
         font-weight: 500;
         line-height: 15px; 
         color: #959595;
    }

    

     .deatils-01 h4{
         font-weight: 500;
         font-size: 12px;
         color: #959595;
    }

    .desclimer p{
       font-size:14px;
    }
    
    </style>
</head>
<body>
   
<div class="border_buttom">
    <table class = "head">
        <tr>
            <td>
             <div class="text">
           <p><span style="margin-top:0px;color:#0083A3;font-size:18px;font-weight: 500;"> <?php echo 'Dr. '.$doc_name?></span> <br>
               <span ><?php echo $degree?> | Reg. No: <?php echo $registration_num?>
            </span>  <br>
    
          
           Mob. No: <?php echo $doc_phone?> <br>
            </p>
         
        </div>   
            </td>
            <td>
 <div class="img">
            <img src="<?php echo base_url('images/AAHRS_logo1.png') ?>" alt="">
        </div>
            </td>
            <td>
<div class="text" style = "margin-left:120px;">
           <p><span style="margin-top:0px;color:#0083A3;font-size:18px;font-weight: 500;"> <?php echo $hos_name?></span> <br>
            <span>   <?php echo $address.', ' .$city.', '.$state;?><br> <?php echo $zip?><br>
    
           Ph: <?php echo $hos_phone?><br>
          </p>
         
        </div>
            </td>
        </tr>
    </table>
</div>


    <div class="present-deatils">
        <div class="heading">
            <h5>Patient Details</h5>
            
        </div>
        <div class="deatils">
            
            <h4 style="margin-top:0px;color:black;"><?php echo $p_name?><br><?php echo (date('Y') - date("Y", strtotime($dob))) ?> yrs, <?php echo $gender?></h4>
           
            <h4 style="padding-bottom:0px;line-height:0px">Address: <span style="margin-top:0px;color:black"><?php echo $address?> </span> </h4>
            <h4 style="line-height:0px">Ph No.: <span style="margin-top:0px;color:black;margin-bottom:0px;"><?php echo $phone?> </span> </h4>
            <h4 style="line-height:10px"> Symptoms (HOPI): <span style="margin-top:0px;color:black"><?php echo $symptoms?> </span> </h4>
            <h4 style="line-height:0px">Provisional Diagnosis: <span style="margin-top:0px;color:black"><?php echo $provisional?> </span>  </h4>
           
        </div>


        <div class="deatils-01" style="margin-top:-35px;">
            <h4 >Ref No: <span style="color:black"><?php echo $p_id?>  </h4>
            <h4 style="line-height:0px">Date & Times: <span style="margin-top:0px;color:black"><?php $date = date('m/d/Y h:i:s a', time()); echo $date?> </span> </h4>

        </div>


        <!-- <table>
            <tr>
                <th>Lab Tests</th>
            <th class="border-0">Medecins</th>
            </tr>

            <tr>
                <td class="border-01" style="width: 50%;">
                    <h4>Allergy Panel, Dust Panel Plus</h4>
                    <p>as soon as possible</p>
                </td>
                <td class="border-0" style="padding-left: 30px;">
                    <div>
                        <div class="float">
                            <p> <?php
                            foreach($medicine as $x)
                            echo $x['medicine'] . '<br>';
                            ?>
                               <br>Tablet
                            </p>
                        </div>
    
                        <div class="border-0 float" style="padding-left: 100px;">
                            <p>Night-1
                                <br>Daily for 2 weeks <br>After food
                            </p>
                        </div>
                    </div>

                    <p style="clear: both;">*****Note: Substitution allowed whorever applicable. *****</p>
                </td>
            </tr>
        </table> -->

        <table>
            <tr>
                <td >Rx</td></tr>
            <tr >
                <th class="border-02 border-0" style="border-top: 2px solid #000;">Medicine Name</th>
                <th class="border-02 border-0" style="border-top: 2px solid #000;">Dosage</th>
                <th class="border-02 border-0" style="border-top: 2px solid #000;">Duration</th>
            </tr>

           
                 <?php   
                 if(isset($medicine)):
                    $c = 1;
                 foreach($medicine as $x):
                 if($c == 11){
                    break;
                    goto a;
                 }
                 ?> 
                    
             <tr >         
                <td style=" padding-left: 5px;" class="border-01 border-0" ><?php echo $c.')  '.$x['medicine'];?></td>
                <td style=" padding-left: 15px;" class="border-01 border-0"><?php echo $x['dosage'];?><br><small style = "font-size:13px;"><?php echo '('.$x['medicine_time'].')';?></small></td>
                <td style=" padding-left: 15px;" class="border-01 border-0"><?php echo $x['duration'].' Days';?></td>
            <?php $c++;    
            endforeach;
            
            endif;
            
                ?>
                
           
              
              
          
        </table>
 <div style = "margin-bottom:50px;">
<span class="heading" style="line-height:0px">Advice Given: <br> <span style="font-size: 12px;">  <?php echo '* '//.$advice ?> </span> </span> 

</div>


<div class="img" style="float: right; text-align: right; position: absolute;  bottom : 230px">
            <img src="<?php echo $signature ?>" alt=""><br>
            <h4 style="float: right; padding-top: 0px; text-align: right;"><?php echo 'Dr. '. $doc_name?> <br>
               <?php echo $degree?> </h4>
        </div>
        
    </div>



    <div class="desclimer" style="clear:both; position: absolute;  bottom : 50px; width:100%;border-bottom: 2px solid #000;">
        <div class="heading"> 
            <h4>Disclaimer</h4>
        </div>

        1. Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
        2. Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
        3. Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
        4. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    </div>
  
</body>
</html>

<?php a: ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
    <!-- top right bottom left -->
    <style>
     
         @page {
            margin: -10px 35px 0px 35px !important;  
           
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;
            src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
        }
         body {
        max-width: 100%;
        padding: 2%;
        font-family: system-ui;
        }

    .float{
        float: left;
    }

    .img img{
       width: 100px;
       margin-left:70px;
    }

    .img{
      
    }

    .text{
       
        text-align: left;
        pad
    }

    .text p{
        font-size: 14px;
        color: #959595;
    }

    p{
        font-size: 14px;
        color: black;
    }

    .text h3{
        margin: 0px;
    }

    .border_buttom{
        border-bottom: 2px solid #000;
        height: 140px;
   
    }

    .border_buttom2{
        border-bottom: 2px solid #000;
             
           padding-bottom : 500px !important;
   
    }

    .border-0{
        border-right: 0px !important;
    }

    .border-02{
        border-left: 0px !important;
        text-align:left;
        padding-left: 15px;
    }

    .border-01{
        border-bottom: 0px !important;
    }

    .present-deatils{

    }

    .present-deatils .heading{
        margin-bottom:-20px;
    }

    table{
        width: 100%;
         border-bottom: 2px solid #000;
        border-spacing: 0;
        margin-bottom: 30px;
        margin-top:130px;
    }

    .head{
        border: none !important; 
        margin-top:0px !important;
      
    }

    .head th,td{
         border: none !important; 
    }

  table th{
         border-right: 2px solid #000;
        border-bottom: 2px solid #000;
        border-left: 2px solid #000;
        padding: 0px 0px;
    }

    table td{
        border-right: 2px solid #000;
        padding: 5px 0px;
         border-bottom: 2px solid #000;
     } 

    table h4{
        font-size:12px;
    }

    table p{
        font-size:12px;
    } 

    .deatils{
         float: left;
         font-size: 12px;
    }

    .deatils-01{
         float: right;
         font-size: 14px;
         
    }

    .deatils  h4{
         font-weight: 500;
         line-height: 15px; 
         color: #959595;
    }

    

     .deatils-01 h4{
         font-weight: 500;
         font-size: 12px;
         color: #959595;
    }

    .desclimer p{
       font-size:14px;
    }
    
    </style>
</head>
<body>
   
<div class="border_buttom">
    <table class = "head">
        <tr>
            <td>
             <div class="text">
           <p><span style="margin-top:0px;color:#0083A3;font-size:18px;font-weight: 500;"> <?php echo 'Dr. '.$doc_name?></span> <br>
               <span ><?php echo $degree?> | Reg. No: <?php echo $registration_num?>
            </span>  <br>
    
          
           Mob. No: <?php echo $doc_phone?> <br>
            </p>
         
        </div>   
            </td>
            <td>
 <div class="img">
            <img src="<?php echo base_url('images/AAHRS_logo1.png') ?>" alt="">
        </div>
            </td>
            <td>
<div class="text" style = "margin-left:120px;">
           <p><span style="margin-top:0px;color:#0083A3;font-size:18px;font-weight: 500;"> <?php echo $hos_name?></span> <br>
            <span>   <?php echo $address.', ' .$city.', '.$state;?><br> <?php echo $zip?><br>
    
           Ph: <?php echo $hos_phone?><br>
          </p>
         
        </div>
            </td>
        </tr>
    </table>
</div>


    <div class="present-deatils">
        <div class="heading">
            <h5>Patient Details</h5>
            
        </div>
        <div class="deatils">
            
            <h4 style="margin-top:0px;color:black;"><?php echo $p_name?><br><?php echo (date('Y') - date("Y", strtotime($dob))) ?> yrs, <?php echo $gender?></h4>
           
            <h4 style="padding-bottom:0px;line-height:0px">Address: <span style="margin-top:0px;color:black"><?php echo $address?> </span> </h4>
            <h4 style="line-height:0px">Ph No.: <span style="margin-top:0px;color:black;margin-bottom:0px;"><?php echo $phone?> </span> </h4>
            <h4 style="line-height:10px"> Symptoms (HOPI): <span style="margin-top:0px;color:black"><?php echo $symptoms?> </span> </h4>
            <h4 style="line-height:0px">Provisional Diagnosis: <span style="margin-top:0px;color:black"><?php echo $provisional?> </span>  </h4>
           
        </div>


        <div class="deatils-01" style="margin-top:-35px;">
            <h4 >Ref No: <span style="color:black"><?php echo $p_id?>  </h4>
            <h4 style="line-height:0px">Date & Times: <span style="margin-top:0px;color:black"><?php $date = date('m/d/Y h:i:s a', time()); echo $date?> </span> </h4>

        </div>


        <!-- <table>
            <tr>
                <th>Lab Tests</th>
            <th class="border-0">Medecins</th>
            </tr>

            <tr>
                <td class="border-01" style="width: 50%;">
                    <h4>Allergy Panel, Dust Panel Plus</h4>
                    <p>as soon as possible</p>
                </td>
                <td class="border-0" style="padding-left: 30px;">
                    <div>
                        <div class="float">
                            <p> <?php
                            foreach($medicine as $x)
                            echo $x['medicine'] . '<br>';
                            ?>
                               <br>Tablet
                            </p>
                        </div>
    
                        <div class="border-0 float" style="padding-left: 100px;">
                            <p>Night-1
                                <br>Daily for 2 weeks <br>After food
                            </p>
                        </div>
                    </div>

                    <p style="clear: both;">*****Note: Substitution allowed whorever applicable. *****</p>
                </td>
            </tr>
        </table> -->

        <table>
            <tr>
                <td >Rx</td></tr>
            <tr >
                <th class="border-02 border-0" style="border-top: 2px solid #000;">Medicine Name</th>
                <th class="border-02 border-0" style="border-top: 2px solid #000;">Dosage</th>
                <th class="border-02 border-0" style="border-top: 2px solid #000;">Duration</th>
            </tr>

           
                 <?php   
                 if(isset($medicine)):
                    $c = 11;
                     $count = 0;
                 foreach($medicine as $x):
                   $count++;
                   if($count<11){
                    continue;
                   }
                 ?> 
                    
             <tr >         
                <td style=" padding-left: 5px;" class="border-01 border-0" ><?php echo $c.')  '.$x['medicine'];?></td>
                <td style=" padding-left: 15px;" class="border-01 border-0"><?php echo $x['dosage'];?><br><small style = "font-size:13px;"><?php echo '('.$x['medicine_time'].')';?></small></td>
                <td style=" padding-left: 15px;" class="border-01 border-0"><?php echo $x['duration'].' Days';?></td>
            <?php $c++;    
            endforeach;
            
            endif;
            
                ?>
                
           
              
              
          
        </table>
 <div style = "margin-bottom:50px;">
<span class="heading" style="line-height:0px">Advice Given: <br> <span style="font-size: 12px;">  <?php echo '* '//.$advice ?> </span> </span> 

</div>


<div class="img" style="float: right; text-align: right; position: absolute;  bottom : 230px">
            <img src="<?php echo $signature ?>" alt=""><br>
            <h4 style="float: right; padding-top: 0px; text-align: right;"><?php echo 'Dr. '. $doc_name?> <br>
               <?php echo $degree?> </h4>
        </div>
        
    </div>



    <div class="desclimer" style="clear:both; position: absolute;  bottom : 50px; width:100%;border-bottom: 2px solid #000;">
        <div class="heading"> 
            <h4>Disclaimer</h4>
        </div>

        1. Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
        2. Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
        3. Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
        4. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    </div>
  
</body>
</html>
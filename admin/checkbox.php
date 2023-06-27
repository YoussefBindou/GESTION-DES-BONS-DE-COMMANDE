<?php
include '../components/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '../components/admin_header.php'; ?>


  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
 
     <img src="istockphoto-1153672822-612x612.jpg" style="width: 20%;height: 20%">
     <div class="container">
     <form action="processuc.php" method="POST">
     <div class="form-row">
    <div class="col-md-4">
        <fieldset>
            <legend>Part 1</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox1" value="DETERMATION BESOINS">
                <label class="form-check-label" for="checkbox1">
                    DETERMATION BESOINS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox2" value="DECISION NORMITION DE LA COMMITION">
                <label class="form-check-label" for="checkbox2">
                    DECISION NORMITION DE LA COMMITION
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox3" value="devis">
                <label class="form-check-label" for="checkbox3">
                    devis
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox4" value="P.V.O">
                <label class="form-check-label" for="checkbox4">
                    P.V.O
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox5" value="BC">
                <label class="form-check-label" for="checkbox5">
                    BC
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox6" value="CFich d'eng">
                <label class="form-check-label" for="checkbox6">
                    CFich d'eng
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-md-4">
        <fieldset>
            <legend>Part 2</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox7" value="B.L">
                <label class="form-check-label" for="checkbox7">
                    B.L
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox8" value="P.V.R">
                <label class="form-check-label" for="checkbox8">
                    P.V.R
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox9" value="ARM">
                <label class="form-check-label" for="checkbox9">
                    ARM
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox10" value="Attachement">
                <label class="form-check-label" for="checkbox10">
                    Attachement
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox11" value="facture">
                <label class="form-check-label" for="checkbox11">
                    facture
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox12" value="accuse de reception">
                <label class="form-check-label" for="checkbox12">
                    accuse de reception
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-md-4">
        <fieldset>
            <legend>Part 3</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox13" value="OP">
                <label class="form-check-label" for="checkbox13">
                    OP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox14" value="OV">
                <label class="form-check-label" for="checkbox14">
                    OV
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox15" value="Decesion reception">
                <label class="form-check-label" for="checkbox15">
                    Decesion reception
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox16" value="Attestation administrative">
                <label class="form-check-label" for="checkbox16">
                    Attestation administrative
                </label>
            </div>
        </fieldset>
    </div>
</div>

      

<input type="submit" name="submit" value="Submit" style="text-align: center;font-size: 20px;background-color: #00b1ff;color: white;border-radius: 1rem;width: 100px;"> 

</form>
</div>
</body>
</html>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    background: white;
    padding: 40px;
  }

  .formbold-img {
    display: block;
    margin: 0 auto 45px;
  }

  .formbold-input-wrapp > div {
   
    gap: 20px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
  
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
    width: 220px;
  }
  .formbold-form-input::placeholder,
  select.formbold-form-input,
  .formbold-form-input[type='date']::-webkit-datetime-edit-text,
  .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
  .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
    color: rgba(83, 99, 135, 0.5);
  }

  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #07074D;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
    margin-left: 8px;
  }

  .formbold-form-file-flex {
    display: flex;
    align-items: center;
    gap: 20px;
  }
  .formbold-form-file-flex .formbold-form-label {
    margin-bottom: 0;
  }
  .formbold-form-file {
    font-size: 14px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-form-file::-webkit-file-upload-button {
    display: none;
  }
  .formbold-form-file:before {
    content: 'Upload file';
    display: inline-block;
    background: #EEEEEE;
    border: 0.5px solid #FBFBFB;
    box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
    border-radius: 3px;
    padding: 3px 12px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    color: #637381;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    margin-right: 10px;
  }

  .formbold-btn {
    text-align: center;
    width: 100%;
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .form-check-label {
    margin-bottom: 10px;
    padding: 2px;
    font-size: 13px;
}
fieldset {
    padding: 10px;
    margin: 10px;
    border: 0;
}

</style>
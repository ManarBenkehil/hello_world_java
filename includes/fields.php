<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
  </head>
  <body>
  <div class="container">
    <div class="left-container">
        <div class="profile-pic">
                <input type="file" id="profile-pic-input">
                <span class="upload-icon">&#x2193;</span>
		    </div>
        <br><br><br><br>
          
         <?php
          foreach($array1 as $field1){
            echo '<div>
            <h1 style="color:#fff; margin-left: 100px;">' . $field1 .' <br></h1>
            <textarea name="field" cols="60" rows="20" style="margin-left: 100px;  color: #000; background-color: #fff;"></textarea>
            </div>';
          }
        ?>
         
    </div>
    <div class="right-container">
     
       <div style="background-color: #000029; margin-top: 80px; margin-right: 60px; margin-left: 1px;"> 
        <h1 style="margin-left: 50px; padding: 12px 12px 12px 12px; color: #fff;"></h1>
       </div>
       <div style="background-color: #000029; margin-right: 60px; margin-left: 1px;"> 
        <h1 style="margin-left: 50px; padding: 12px 12px 12px 12px; color: #fff;"></h1>
       </div>
        
       <div style="background-color: #fff; margin-left: 40px; margin-right: 60px;">
       <br>
          <i class="material-icons" style="color: #000029">email</i>
          <input type="email"> 
          <br><br>
          <i class="material-icons" style="color: #000029">phone</i>
          <input type="number"> 
          <br><br>
          <i class="material-icons" style="color: #000029">place</i>
          <input type="text"> 
          <br><br>
          <i class="material-icons" style="color: #000029">cake</i>
          <input type="text">
       </div>
      
      <?php
         foreach($array2 as $field2){
          echo '<div style="background-color: #000029; margin-top: 80px; margin-right: 60px; margin-left: 1px;">
            <h1 style="margin-left: 50px; padding: 12px 12px 12px 12px; color: #fff;">' . $field2 . '<br></h1>
             </div>
            <textarea name="field" cols="60" rows="20" style="margin-left: 100px; color: #000; background-color: #fff;"></textarea>';
            }
          ?>
        
    </div>
    </div>
    <script type="text/javascript">
		const profilePic = document.querySelector('.profile-pic');
		const profilePicInput = document.querySelector('#profile-pic-input');

		profilePic.addEventListener('click', function() {
			profilePicInput.click();
		});

		profilePicInput.addEventListener('change', function() {
			const file = this.files[0];

			if (file) {
				const reader = new FileReader();

				reader.addEventListener('load', function() {
					profilePic.style.backgroundImage = `url(${this.result})`;
					profilePic.style.backgroundSize = 'cover';
				});

				reader.readAsDataURL(file);
			}
		});
	</script>
  </body>
</html>

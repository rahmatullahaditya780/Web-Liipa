<?php
session_start();

// Jika sudah login, langsung redirect
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <!-- Favicon -->
  <link href="../img/icon.png" rel="icon">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <h1>Signup</h1>
    <p id="error-message" style="color: red;"></p>

    <form id="form">
      <div>
        <a href="../index.php">
          <img class="icon" src="icon.png" style="width: 80px; height: 40px;">
        </a>
      </div>

      <!-- Username -->
      <div>
        <label for="username-input">
           <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"/>
          </svg> 
        </label>
        <input 
          type="text" 
          name="username" 
          id="username-input" 
          placeholder="Username" 
          required
        >
      </div>

      <!-- Email -->
      <div>
        <label for="email-input"><span>@</span></label>
        <input 
          type="email" 
          name="email" 
          id="email-input" 
          placeholder="Email"
          required
        >
      </div>

      <!-- Password -->
      <div>
        <label for="password-input">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/>
          </svg>
        </label>
        <input 
          type="password" 
          name="password" 
          id="password-input" 
          placeholder="Password"
          required
        >
      </div>

      <!-- Repeat Password -->
      <div>
        <label for="repeat-password-input">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z"/>
          </svg>
        </label>
        <input 
          type="password" 
          name="repeat-password" 
          id="repeat-password-input" 
          placeholder="Repeat Password"
          required
        >
      </div>

      <button type="submit">Signup</button>

      <div>
        <label for="google-label" style="background-color:white">
          <!-- Google SVG omitted for brevity -->
        </label>
      </div>
    </form>

    <p>Already have an Account? <a href="../Login-SignUp-Liipa/login.php">login</a></p>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Inline JavaScript untuk consume API -->
  <script>
      document.getElementById('form').addEventListener('submit', async function(e) {
        e.preventDefault();
    
        const formData = new FormData(this);
        let resp, data;
    
        try {
          resp = await fetch('../api/daftar.php', {
            method: 'POST',
            body: formData
          });
          data = await resp.json();
        } catch (err) {
          console.error(err);
          return Swal.fire({
            icon: 'error',
            title: 'Network Error',
            text: 'Terjadi kesalahan jaringan. Silakan coba lagi.'
          });
        }
    
        // 1) Duplikasi username/email
        if (!resp.ok && data.duplicate) {
          return Swal.fire({
            icon: 'error',
            title: 'Registrasi Gagal',
            text: data.message
          }).then(() => {
            window.location.href ='../Login-SignUp-Liipa/login.php';
          });
        }
    
        // 2) Error validasi lain / server error
        if (!resp.ok) {
          let errorMsg = 'Unknown error.';
          if (Array.isArray(data.errors)) {
            errorMsg = data.errors.join(' ');
          } else if (data.error) {
            errorMsg = data.error;
          }
          return Swal.fire({
            icon: 'error',
            title: 'Registrasi Gagal',
            text: errorMsg
          });
        }
    
        // 3) Sukses
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: data.message || 'Signup successful!',
          timer: 1500,
          showConfirmButton: false
        }).then(() => {
          window.location.href = '../Login-SignUp-Liipa/login.php';
        });
      });
    </script>

</body>
</html>

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
  <title>Login</title>
  <!-- Favicon -->
  <link href="../img/icon.png" rel="icon">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <h1>Login</h1>
    <p id="error-message" style="color: red;"></p>

    <form id="form">
      <div>
        <a href="../index.php">
          <img class="icon" src="icon.png" style="width: 80px; height: 40px;">
        </a>
      </div>
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
      <button type="submit">Login</button>
    </form>

    <p>New here? <a href="../Login-SignUp-Liipa/signup.php">Create an Account</a></p>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      document.getElementById('form').addEventListener('submit', async function(e) {
        e.preventDefault();
    
        const formData = new FormData(this);
        let resp, text, data;
    
        try {
          resp = await fetch('../api/login.php', {
            method: 'POST',
            body: formData,
          });
        } catch (networkErr) {
          console.error(networkErr);
          Swal.fire({
            icon: 'error',
            title: 'Network Error',
            text: 'Gagal terhubung ke server. Silakan coba lagi.',
          });
          return;
        }
    
        // Baca raw response
        text = await resp.text();
    
        // Pastikan JSON
        const contentType = resp.headers.get('content-type') || '';
        if (contentType.includes('application/json')) {
          try {
            data = JSON.parse(text);
          } catch (parseErr) {
            console.error('Failed to parse JSON:', parseErr);
            Swal.fire({
              icon: 'error',
              title: 'Response Error',
              text: 'Respon dari server tidak valid JSON.',
            });
            return;
          }
        } else {
          console.error('Expected JSON but got:', text);
          Swal.fire({
            icon: 'error',
            title: 'Server Error',
            text: 'Server tidak mengembalikan JSON.',
          });
          return;
        }
    
        // Cek jika sudah login sebelumnya
        if (data.already) {
          // langsung redirect ke index
          window.location.href = '../index.php';
          return;
        }
    
        // Tangani response JSON biasa
        if (!resp.ok) {
          let errorMsg = 'Login gagal.';
          if (Array.isArray(data.errors)) {
            errorMsg = data.errors.join(' ');
          } else if (data.error) {
            errorMsg = data.error;
          }
          Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: errorMsg,
          });
        } else {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: data.message || 'Login berhasil!',
            timer: 1500,
            showConfirmButton: false
          }).then(() => {
            window.location.href = '../index.php';
          });
        }
      });
    </script>

</body>
</html>

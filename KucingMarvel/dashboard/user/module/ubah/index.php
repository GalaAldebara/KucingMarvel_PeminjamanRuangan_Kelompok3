<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <?php
        // Password change form
        echo "<div class='container mt-2'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title mb-4 pl-2 text-left'>Ubah Password</h4>"; // Form title

        echo "<form action='function/prosesUpdatePassword.php' method='post'>";

        // Current Password
        echo "<div class='mb-3'>";
        echo "<label for='currentPassword' class='form-label'>Password Saat Ini</label>";
        echo "<div class='input-group'>";
        echo "<input type='password' class='form-control' id='currentPassword' name='currentPassword' required>";
        echo "<button type='button' class='btn btn-outline-secondary' onclick='togglePasswordVisibility(\"currentPassword\")'><i class='far fa-eye-slash'></i></button>";
        echo "</div>";
        echo "</div>";

        // New Password
        echo "<div class='mb-3'>";
        echo "<label for='newPassword' class='form-label'>Password Baru</label>";
        echo "<div class='input-group'>";
        echo "<input type='password' class='form-control' id='newPassword' name='newPassword' required>";
        echo "<button type='button' class='btn btn-outline-secondary' onclick='togglePasswordVisibility(\"newPassword\")'><i class='far fa-eye-slash'></i></button>";
        echo "</div>";
        echo "</div>";

        // Confirm Password
        echo "<div class='mb-3'>";
        echo "<label for='confirmPassword' class='form-label'>Konfirmasi Password Baru</label>";
        echo "<div class='input-group'>";
        echo "<input type='password' class='form-control' id='confirmPassword' name='confirmPassword' required>";
        echo "<button type='button' class='btn btn-outline-secondary' onclick='togglePasswordVisibility(\"confirmPassword\")'><i class='far fa-eye-slash'></i></button>";
        echo "</div>";
        echo "</div>";

        echo "<button type='submit' class='btn btn-primary'>Ubah Password</button>";
        echo "</form>";

        echo "</div>"; // card-body
        echo "</div>"; // card
        echo "</div>"; // container
        ?>
    </div>
</div>
<?php

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $user = new user();
    $userDetails = $user->getUserById($userId);

    if ($userDetails) {
        $username = $userDetails['username'];
        $password = $userDetails['password'];
        $fullname = $userDetails['fullname'];
        $email = $userDetails['email'];
        $role = $userDetails['role'];
        $avatar = $userDetails['avatar'];
        $address = $userDetails['address'];
        $phone = $userDetails['phone'];

        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cập nhật người dùng</title>
            <!-- Thêm link CSS của Bootstrap -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>

        <div class="container mt-5">
            <h2 class="mb-4">Sửa account</h2>

            <form method="post" enctype="multipart/form-data" onsubmit="return validateUpdateUser()">
                <div class="form-group">
                    <label for="userId">ID</label>
                    <input type="text" class="form-control" id="userId" name="userId" value="<?php echo $userId; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
                    <span id="usernameError" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" readonly>
                    <span id="passwordError" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
                    <span id="fullnameError" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    <span id="emailError" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="role">Phân quyền</label>
                    <select class="form-control" id="role" name="role">
                        <?php
                        $roles = array(
                            0 => 'User',
                            1 => 'Admin'
                        );

                        foreach ($roles as $key => $value) {
                            $selected = ($key == $role) ? 'selected' : '';
                            echo "<option value='$key' $selected>$value</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control-file" id="avatar" name="avatar" accept="image/*">
                    <?= $avatar ?>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                    <span id="phoneError" style="color: red;"></span>
                </div>

                <a href="index.php?act=listuser" type="button" class="btn btn-danger">Hủy</a>
                <button class="btn btn-primary" name="updateUser">Sửa</button>
            </form>
            <script src="../validate/validateuser.js"></script>
            <!-- Thêm link JavaScript của Bootstrap (nếu cần) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        </body>

        </html>
        <?php
    } else {
        echo "Người dùng không tồn tại.";
    }
} else {
    echo "Lỗi: Không có ID người dùng được chỉ định.";
}
?>
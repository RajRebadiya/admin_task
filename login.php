<?php
include 'config.php';
session_start();
$alertMsg = '';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $m_pwd = md5($password);
    $sql = "SELECT * FROM admin WHERE email= '$email' AND password = '$m_pwd'";

    $result = mysqli_query($con, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        header('location: dashboard.php');
        exit;
    } else {
        $alertMsg = '<div class="alert alert-danger" id="alert" role="alert">
        Wrong Creditials
        </div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preadmin.dreamstechnologies.com/html/school/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 10:39:26 GMT -->

<head>
    <meta charset="utf-8">
    <title>Preschool - Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <style type="text/css">
        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/300/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/300/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/300/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/300/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/300/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/300/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/300/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/400/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/400/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/400/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/400/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/400/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/400/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/400/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/500/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/500/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/500/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/500/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/500/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/500/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/500/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/700/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/700/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/700/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/700/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/700/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/700/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/700/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/900/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/900/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/900/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/900/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/900/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/900/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/900/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }
    </style>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <script>
        // Function to remove the alert after 2 seconds
        setTimeout(function() {
            var alert = document.getElementById('alert');
            if (alert) {
                alert.remove();
            }
        }, 2000);
    </script>
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title text-white">Login</h3>
                <?php echo $alertMsg; ?>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="index.html"><img src="assets/img/logo.png" alt="SchoolAdmin"></a>
                        </div>
                        <form action="" method="post">
                            <div class="form-group">
                                <label> Email</label>
                                <input type="text" name='email' class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group text-center custom-mt-form-group">
                                <button name='submit' class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                            </div>
                            <!-- <div class="text-center">
                                <a href="forgot-password.html">Forgot your password?</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js" type="7f919e4c3311f6c00532d278-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="7f919e4c3311f6c00532d278-text/javascript"></script>

    <script src="assets/js/jquery.slimscroll.js" type="7f919e4c3311f6c00532d278-text/javascript"></script>

    <script src="assets/js/app.js" type="7f919e4c3311f6c00532d278-text/javascript"></script>
    <script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7f919e4c3311f6c00532d278-|49" defer></script>
</body>

<!-- Mirrored from preadmin.dreamstechnologies.com/html/school/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 10:39:26 GMT -->

</html>
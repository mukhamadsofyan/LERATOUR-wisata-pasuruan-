<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kode Verifikasi LERATOUR</title>
</head>

<body style="margin:0;padding:0;background-color:#f1f5f9;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:32px 0;">
        <tr>
            <td align="center">

                <!-- CARD -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="
    background:#ffffff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
">

                    <!-- HEADER -->
                    <tr>
                        <td align="center" style="
    background:#0d9488;
    padding:24px 20px;
">

                            <!-- LOGO WRAPPER -->
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <img src="https://drive.google.com/uc?export=view&id=1_skUs_Nafwdj8VccY29vpl2XUnY2Btvw"
                                            alt="LERATOUR"
                                            style="
    display:block;
    max-width:180px;
    width:100%;
    height:auto;
  " />


                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- CONTENT -->
                    <tr>
                        <td style="padding:36px 40px;color:#374151;">

                            <p style="margin:0 0 14px;font-size:15px;">
                                Halo <strong>{{ $name }}</strong>,
                            </p>

                            <p style="margin:0 0 22px;font-size:15px;line-height:1.7;">
                                Terima kasih telah mendaftar di <strong>LERATOUR</strong>.
                                Untuk melanjutkan proses pendaftaran akun kamu,
                                silakan masukkan kode verifikasi berikut:
                            </p>

                            <!-- OTP BOX -->
                            <div style="text-align:center;margin:32px 0;">
                                <span
                                    style="
    display:inline-block;
    background:#f0fdfa;
    color:#0f766e;
    font-size:30px;
    letter-spacing:8px;
    padding:18px 36px;
    border-radius:10px;
    font-weight:700;
    border:2px dashed #5eead4;
">
                                    {{ $otp }}
                                </span>
                            </div>

                            <p style="margin:0 0 10px;font-size:14px;color:#6b7280;">
                                Kode ini berlaku dalam waktu terbatas dan bersifat <strong>rahasia</strong>.
                            </p>

                            <p style="margin:0;font-size:14px;color:#6b7280;">
                                Jika kamu tidak merasa melakukan pendaftaran di LERATOUR,
                                abaikan email ini.
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#f8fafc;padding:20px;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#9ca3af;">
                                © {{ date('Y') }} <strong>LERATOUR</strong><br>
                                Jelajahi Wisata • Mudah • Aman • Terpercaya
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- END CARD -->

            </td>
        </tr>
    </table>

</body>

</html>

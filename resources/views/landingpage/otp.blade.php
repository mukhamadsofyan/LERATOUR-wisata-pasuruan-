<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Kode Verifikasi</title>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,Helvetica,sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6;padding:40px 0;">
    <tr>
      <td align="center">

        <table width="600" cellpadding="0" cellspacing="0"
          style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 10px rgba(0,0,0,0.08);">

          <!-- HEADER -->
          <tr>
            <td style="background:#0d9488;padding:24px;text-align:center;">
              <h1 style="margin:0;color:#ffffff;font-size:22px;letter-spacing:1px;">
                LERATOUR
              </h1>
            </td>
          </tr>

          <!-- CONTENT -->
          <tr>
            <td style="padding:32px;color:#374151;">
              <p style="margin:0 0 16px;font-size:15px;">
                Halo <strong>{{ $name }}</strong>,
              </p>

              <p style="margin:0 0 20px;font-size:15px;line-height:1.6;">
                Terima kasih telah mendaftar di <strong>LERATOUR</strong>.
                Untuk melanjutkan proses pendaftaran, silakan masukkan
                kode verifikasi berikut:
              </p>

              <div style="text-align:center;margin:30px 0;">
                <span
                  style="
                    display:inline-block;
                    background:#f1f5f9;
                    color:#0f172a;
                    font-size:28px;
                    letter-spacing:6px;
                    padding:16px 28px;
                    border-radius:6px;
                    font-weight:bold;
                  ">
                  {{ $otp }}
                </span>
              </div>

              <p style="margin:0 0 12px;font-size:14px;color:#6b7280;">
                Kode ini bersifat rahasia dan jangan dibagikan kepada siapa pun.
              </p>

              <p style="margin:0;font-size:14px;color:#6b7280;">
                Jika kamu tidak merasa mendaftar di LERATOUR, abaikan email ini.
              </p>
            </td>
          </tr>

          <!-- FOOTER -->
          <tr>
            <td style="background:#f9fafb;padding:20px;text-align:center;">
              <p style="margin:0;font-size:12px;color:#9ca3af;">
                © {{ date('Y') }} LERATOUR. All rights reserved.
              </p>
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>

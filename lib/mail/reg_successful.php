<?php 
$email_content="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
  <meta http-equiv='X-UA-Compatible' content='IE=edge' />
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1' />
  <title></title>
  <style type='text/css'>
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }
table { border-spacing: 0; border-collapse: collapse; table-layout: fixed; margin: 0 auto; }
table table table { table-layout: auto; }
img { display: block !important; over-flow: hidden !important; }
table td { border-collapse: collapse; }
.yshortcuts a { border-bottom: none !important; }
img:hover { opacity: 0.9 !important; }
a { color: #6ec8c7; text-decoration: none; }
.textbutton a { font-family: 'open sans', arial, sans-serif !important; color: #ffffff !important; }
.footer-link a { color: #7f8c8d !important; }

/*Responsive*/
@media only screen and (max-width: 640px) {
body { width: auto !important; }
table[class='table-inner'] { width: 90% !important; }
table[class='table-full'] { width: 100% !important; text-align: center !important; background: none !important; }
/* Image */
img[class='img1'] { width: 100% !important; height: auto !important; }
}

@media only screen and (max-width: 479px) {
body { width: auto !important; }
table[class='table-inner'] { width: 90% !important; }
table[class='table-full'] { width: 100% !important; text-align: center !important; background: none !important; }
/* image */
img[class='img1'] { width: 100% !important; height: auto !important; }
}
</style>
</head>

<body>
  <!--header-->
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#fff'>
    <tr>
      <td align='center'>
        <table width='520' border='0' align='center' cellpadding='0' cellspacing='0' class='table-inner'>
          <tr>
            <td height='50'></td>
          </tr>
          <!--Header Logo-->
          <tr>
            <td align='center' style='line-height: 0px;'><img style='display:block; line-height:0px; font-size:0px; border:0px; height:50px;max-width: 50px;' src='".$emaillogo."' alt='img' /></td>
          </tr>
          <!--end Header Logo-->
          <tr>
            <td height='10'></td>
          </tr>
          <!--slogan-->
          <tr>
            <td align='center' style='font-family: Open Sans, Arial, sans-serif; color:#95a5a6; font-size:13px; letter-spacing: 1px;line-height: 28px; font-style:italic;'>".$set['site_name']."</td>
          </tr>
          <!--end slogan-->
          <tr>
            <td height='10'></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--end header-->
  <!--header-->
  <!--end header-->
  <!--1/1 Content-->
  <table align='center' bgcolor='#fff' width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td align='center'>
        <table style='border-bottom-left-radius:6px;border-bottom-right-radius:6px; box-shadow:0px 3px 0px #e0e5eb;' bgcolor='#FFFFFF' align='center' class='table-inner' width='520' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td align='center'>
              <table class='table-inner' width='440' border='0' align='center' cellpadding='0' cellspacing='0'>
                <tr>
                  <td height='35'></td>
                </tr>
                <!--title-->
                <tr>
                  <td align='center' style='font-family: Open sans, Arial, sans-serif; color:#3b3b3b; font-size:22px;font-weight: bold; line-height: 28px;'>Successful Email Verification & Welcome to ".$set['site_name']."</td>
                </tr>
                <!--end title-->
                  <tr>
                  <td height='15'></td>
                </tr>
                <!--content-->
                <tr>
                  <td align='center' style='font-family: Open sans, Arial, sans-serif; color:#7f8c8d; font-size:14px; line-height: 28px;'>Welcome to ".$set['site_name'].", you are now a member of ".$set['site_name'].". This is the world's most secure payment. all transaction using ".$set['site_name']." are kept in trust. Your email verification was successful, you can now Sign into your account.</td>
                </tr>
                <tr>
                  <td height='15'></td>
                </tr>
                <tr>
                  <td align='center' style='font-family: Open sans, Arial, sans-serif; color:#a7aeb3; font-size:13px; line-height: 28px;font-style: italic;'>*Click here to sign into account. ;</td>
                </tr>
                <!--button-->
                <tr>
                  <td align='center'>
                    <table class='textbutton' bgcolor='#ffb345' style='border-radius:4px;' border='0' align='center' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td height='45' align='center' style='font-family: Open sans, Arial, sans-serif; color:#FFFFFF; font-size:16px;padding-left: 35px;padding-right: 35px; font-weight: bold;'><a href='".$url."/login'>Access account</a></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <!--end content-->
                <tr>
                  <td height='30'></td>
                </tr>
                
                <tr>
                  <td height='5'></td>
                </tr>
                <tr>
                  <td align='left' style='font-family: Open sans, Arial, sans-serif; color:#a7aeb3; font-size:13px; line-height: 28px;font-style: italic;'>Regards,</td>
                </tr>
               <tr>
                  <td align='left' style='font-family: Open sans, Arial, sans-serif; color:#000; font-size:13px; line-height: 28px;font-style: italic;'>".$set['site_name']."</td>
                </tr>
                <tr>
                  <td height='35'></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <table align='center' class='table-inner' width='520' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td height='20'></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--end 1/1 Content-->
  <!--footer-->
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#fff'>
    <tr>
      <td align='center'>
        <table align='center' class='table-inner' width='520' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td height='70'></td>
          </tr>
          <!--preference-->
          <tr>
            <td class='footer-link' align='center' style='font-family: Open sans, Arial, sans-serif; color:#7f8c8d; font-size:12px; line-height: 28px;'>You can reach us for support at <a href='mailto:".$set['email']."'>".$set['email']."</a> A friendly member of our team will be happy to assist you between 8am and 11pm. Monday to Friday</td>
          </tr>
          <!--end preference-->
        </table>
      </td>
    </tr>
    <tr>
      <td height='55'></td>
    </tr>
  </table>
  <!--end footer-->
</body>

</html>
";?>
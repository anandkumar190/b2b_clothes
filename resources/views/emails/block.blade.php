<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="x-apple-disable-message-reformatting">
      <title>Blocked</title>
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
      <link rel="stylesheet" href="{{url('public/email/style.css')}}">
   </head>
   <body width="100%" style="padding: 0 !important;background-color: #f1f1f1;">
      <center style="width: 100%; background-color: #f1f1f1;">
         <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
               <tr>
                  <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                     <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                           <td class="logo" style="text-align: center;">
                           <h1>Dear, {{$display_name}}</h1>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
               <tr>
                  <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                     <img src="{{url('public/email/email.png')}}" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
                  </td>
               </tr>
               <tr>
                  <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                     <table>
                        <tr>
                           <td>
                            <div class="text" style="padding: 0 2.5em; text-align: center;">
                                 <h2>You have been blocked from selling your products due to various reasons </h2>
                                 <h3>Email has been sent to your registered email id </h3>
                                 <h3>We request you to contact admin to know the reason and to re-activate your account .</h3>
                                 <hr>
                                 <h3>Thanks, <br>
                                 Team
                                 </h3>
                              </div>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
         </div>
      </center>
   </body>
</html>
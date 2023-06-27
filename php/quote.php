<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require '../env.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$_r       = $_POST['_r'] ?? '';
$name       = $_POST['name'] ?? '';
$email      = $_POST['email'] ?? '';
$phone      = $_POST['phone'] ?? '';
$event_type = $_POST['event_type'] ?? '';
$event_size = $_POST['event_size'] ?? '';
$message    = $_POST['message'] ?? '';

$htmlBody = '
<!DOCTYPE html>
<html
  lang="en"
  xmlns:o="urn:schemas-microsoft-com:office:office"
  xmlns:v="urn:schemas-microsoft-com:vml"
>
  <head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <style>
      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        padding: 0;
      }

      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: inherit !important;
      }

      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
      }

      p {
        line-height: inherit;
      }

      .desktop_hide,
      .desktop_hide table {
        mso-hide: all;
        display: none;
        max-height: 0px;
        overflow: hidden;
      }

      .image_block img + div {
        display: none;
      }

      @media (max-width: 660px) {
        .desktop_hide table.icons-inner {
          display: inline-block !important;
        }

        .icons-inner {
          text-align: center;
        }

        .icons-inner td {
          margin: 0 auto;
        }

        .row-content {
          width: 100% !important;
        }

        .mobile_hide {
          display: none;
        }

        .stack .column {
          width: 100%;
          display: block;
        }

        .mobile_hide {
          min-height: 0;
          max-height: 0;
          max-width: 0;
          overflow: hidden;
          font-size: 0px;
        }

        .desktop_hide,
        .desktop_hide table {
          display: table !important;
          max-height: none !important;
        }
      }
    </style>
  </head>
  <body
    style="
      background-color: #f1f4f8;
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: none;
      text-size-adjust: none;
    "
  >
    <table
      border="0"
      cellpadding="0"
      cellspacing="0"
      class="nl-container"
      role="presentation"
      style="
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        background-color: #f1f4f8;
      "
      width="100%"
    >
      <tbody>
        <tr>
          <td>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-1"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 10px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 5px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 12px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 14.399999999999999px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 16px;
                                          text-align: center;
                                          mso-line-height-alt: 19.2px;
                                        "
                                      >
                                        <span style="font-size: 46px; color: #003188;">
                                          <strong>Big Caters</strong>
                                        </span>
                                        '.(!empty($_r) ? 
                                            '<br><span style="font-size: 25px; color: #003188;">
                                              <strong>('.$_r.')</strong><br>
                                            </span>'
                                           : '').'
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-4"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tbody>
                                <tr>
                                  <td class="pad">
                                    <div align="center" class="alignment">
                                      <table
                                        border="0"
                                        cellpadding="0"
                                        cellspacing="0"
                                        role="presentation"
                                        style="
                                          mso-table-lspace: 0pt;
                                          mso-table-rspace: 0pt;
                                        "
                                        width="90%"
                                      >
                                        <tbody>
                                          <tr>
                                            <td
                                              class="divider_inner"
                                              style="
                                                font-size: 1px;
                                                line-height: 1px;
                                                border-top: 1px solid #ccd6e7;
                                              "
                                            >
                                              <span> </span>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-2"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="divider_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 10px;
                                    padding-right: 10px;
                                    padding-top: 30px;
                                  "
                                >
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="100%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 0px solid #bbbbbb;
                                          "
                                        >
                                          <span> </span>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 10px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 14px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 16.8px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 14px;
                                          text-align: left;
                                          mso-line-height-alt: 16.8px;
                                        "
                                      >
                                        <strong
                                          ><span
                                            style="
                                              color: #003188;
                                              font-size: 20px;
                                            "
                                            >Name:</span
                                          ></strong
                                        >
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="button_block block-3"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    text-align: left;
                                  "
                                >
                                  <div align="left" class="alignment">
                                    <div
                                      style="
                                        text-decoration: none;
                                        display: inline-block;
                                        color: #003188;
                                        background-color: transparent;
                                        border-radius: 4px;
                                        width: auto;
                                        border-top: 1px solid transparent;
                                        font-weight: undefined;
                                        border-right: 1px solid transparent;
                                        border-bottom: 1px solid transparent;
                                        border-left: 1px solid transparent;
                                        padding-top: 5px;
                                        padding-bottom: 15px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        font-size: 16px;
                                        text-align: center;
                                        mso-border-alt: none;
                                        word-break: keep-all;
                                      "
                                    >
                                      <span
                                        style="
                                          padding-left: 0px;
                                          padding-right: 60px;
                                          font-size: 16px;
                                          display: inline-block;
                                          letter-spacing: normal;
                                        "
                                        ><span
                                          style="
                                            word-break: break-word;
                                            line-height: 32px;
                                          "
                                          >'.$name.'</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-4"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td class="pad">
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="90%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 1px solid #ccd6e7;
                                          "
                                        >
                                          <span> </span>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-3"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 10px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 10px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 14px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 16.8px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 14px;
                                          text-align: left;
                                          mso-line-height-alt: 16.8px;
                                        "
                                      >
                                        <strong
                                          ><span
                                            style="
                                              color: #003188;
                                              font-size: 20px;
                                            "
                                            >Email:</span
                                          ></strong
                                        >
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="button_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    text-align: left;
                                  "
                                >
                                  <div align="left" class="alignment">
                                    <div
                                      style="
                                        text-decoration: none;
                                        display: inline-block;
                                        color: #003188;
                                        background-color: transparent;
                                        border-radius: 4px;
                                        width: auto;
                                        border-top: 1px solid transparent;
                                        font-weight: undefined;
                                        border-right: 1px solid transparent;
                                        border-bottom: 1px solid transparent;
                                        border-left: 1px solid transparent;
                                        padding-top: 5px;
                                        padding-bottom: 15px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        font-size: 16px;
                                        text-align: center;
                                        mso-border-alt: none;
                                        word-break: keep-all;
                                      "
                                    >
                                      <span
                                        style="
                                          padding-left: 0px;
                                          padding-right: 60px;
                                          font-size: 16px;
                                          display: inline-block;
                                          letter-spacing: normal;
                                        "
                                        ><span
                                          style="
                                            word-break: break-word;
                                            line-height: 32px;
                                          "
                                          >'.$email.'</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-3"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td class="pad">
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="90%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 1px solid #ccd6e7;
                                          "
                                        >
                                          <span> </span>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-4"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 10px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 10px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 14px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 16.8px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 14px;
                                          text-align: left;
                                          mso-line-height-alt: 16.8px;
                                        "
                                      >
                                        <strong
                                          ><span
                                            style="
                                              color: #003188;
                                              font-size: 20px;
                                            "
                                            >Phone Number:</span
                                          ></strong
                                        >
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="button_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    text-align: left;
                                  "
                                >
                                  <div align="left" class="alignment">
                                    <div
                                      style="
                                        text-decoration: none;
                                        display: inline-block;
                                        color: #003188;
                                        background-color: transparent;
                                        border-radius: 4px;
                                        width: auto;
                                        border-top: 1px solid transparent;
                                        font-weight: undefined;
                                        border-right: 1px solid transparent;
                                        border-bottom: 1px solid transparent;
                                        border-left: 1px solid transparent;
                                        padding-top: 5px;
                                        padding-bottom: 15px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        font-size: 16px;
                                        text-align: center;
                                        mso-border-alt: none;
                                        word-break: keep-all;
                                      "
                                    >
                                      <span
                                        style="
                                          padding-left: 0px;
                                          padding-right: 60px;
                                          font-size: 16px;
                                          display: inline-block;
                                          letter-spacing: normal;
                                        "
                                        ><span
                                          style="
                                            word-break: break-word;
                                            line-height: 32px;
                                          "
                                          >'.$phone.'</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-3"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td class="pad">
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="90%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 1px solid #ccd6e7;
                                          "
                                        >
                                          <span> </span>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-5"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 10px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 10px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 14px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 16.8px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 14px;
                                          text-align: left;
                                          mso-line-height-alt: 16.8px;
                                        "
                                      >
                                        <strong
                                          ><span
                                            style="
                                              color: #003188;
                                              font-size: 20px;
                                            "
                                            >Event Type:</span
                                          ></strong
                                        >
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="button_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    text-align: left;
                                  "
                                >
                                  <div align="left" class="alignment">
                                    <div
                                      style="
                                        text-decoration: none;
                                        display: inline-block;
                                        color: #003188;
                                        background-color: transparent;
                                        border-radius: 4px;
                                        width: auto;
                                        border-top: 1px solid transparent;
                                        font-weight: undefined;
                                        border-right: 1px solid transparent;
                                        border-bottom: 1px solid transparent;
                                        border-left: 1px solid transparent;
                                        padding-top: 5px;
                                        padding-bottom: 15px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        font-size: 16px;
                                        text-align: center;
                                        mso-border-alt: none;
                                        word-break: keep-all;
                                      "
                                    >
                                      <span
                                        style="
                                          padding-left: 0px;
                                          padding-right: 60px;
                                          font-size: 16px;
                                          display: inline-block;
                                          letter-spacing: normal;
                                        "
                                        ><span
                                          style="
                                            word-break: break-word;
                                            line-height: 32px;
                                          "
                                          >'.$event_type.'</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-3"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td class="pad">
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="90%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 1px solid #ccd6e7;
                                          "
                                        >
                                          <span> </span>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-6"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 10px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 10px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 14px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 16.8px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 14px;
                                          text-align: left;
                                          mso-line-height-alt: 16.8px;
                                        "
                                      >
                                        <strong
                                          ><span
                                            style="
                                              color: #003188;
                                              font-size: 20px;
                                            "
                                            >Event Size:</span
                                          ></strong
                                        >
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="button_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    text-align: left;
                                  "
                                >
                                  <div align="left" class="alignment">
                                    <div
                                      style="
                                        text-decoration: none;
                                        display: inline-block;
                                        color: #003188;
                                        background-color: transparent;
                                        border-radius: 4px;
                                        width: auto;
                                        border-top: 1px solid transparent;
                                        font-weight: undefined;
                                        border-right: 1px solid transparent;
                                        border-bottom: 1px solid transparent;
                                        border-left: 1px solid transparent;
                                        padding-top: 5px;
                                        padding-bottom: 15px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        font-size: 16px;
                                        text-align: center;
                                        mso-border-alt: none;
                                        word-break: keep-all;
                                      "
                                    >
                                      <span
                                        style="
                                          padding-left: 0px;
                                          padding-right: 60px;
                                          font-size: 16px;
                                          display: inline-block;
                                          letter-spacing: normal;
                                        "
                                        ><span
                                          style="
                                            word-break: break-word;
                                            line-height: 32px;
                                          "
                                          >'.$event_size.'</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-3"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td class="pad">
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="90%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 1px solid #ccd6e7;
                                          "
                                        >
                                          <span> </span>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-7"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 10px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 10px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 14px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 16.8px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 14px;
                                          text-align: left;
                                          mso-line-height-alt: 16.8px;
                                        "
                                      >
                                        <strong
                                          ><span
                                            style="
                                              color: #003188;
                                              font-size: 20px;
                                            "
                                            >Details:</span
                                          ></strong
                                        >
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="button_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    text-align: left;
                                  "
                                >
                                  <div align="left" class="alignment">
                                    <div
                                      style="
                                        text-decoration: none;
                                        display: inline-block;
                                        color: #003188;
                                        background-color: transparent;
                                        border-radius: 4px;
                                        width: auto;
                                        border-top: 1px solid transparent;
                                        font-weight: undefined;
                                        border-right: 1px solid transparent;
                                        border-bottom: 1px solid transparent;
                                        border-left: 1px solid transparent;
                                        padding-top: 5px;
                                        padding-bottom: 15px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        font-size: 16px;
                                        text-align: center;
                                        mso-border-alt: none;
                                        word-break: keep-all;
                                      "
                                    >
                                      <span
                                        style="
                                          padding-left: 0px;
                                          padding-right: 60px;
                                          font-size: 16px;
                                          display: inline-block;
                                          letter-spacing: normal;
                                        "
                                        ><span
                                          style="
                                            word-break: break-word;
                                            line-height: 32px;
                                          "
                                          >'.$message.'</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="10"
                              cellspacing="0"
                              class="divider_block block-3"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                              "
                              width="100%"
                            >
                              <tr>
                                <td class="pad">
                                  <div align="center" class="alignment">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      role="presentation"
                                      style="
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                      "
                                      width="90%"
                                    >
                                      <tr>
                                        <td
                                          class="divider_inner"
                                          style="
                                            font-size: 1px;
                                            line-height: 1px;
                                            border-top: 1px solid #ccd6e7;
                                          "
                                        >
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table
              align="center"
              border="0"
              cellpadding="0"
              cellspacing="0"
              class="row row-8"
              role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
              width="100%"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      align="center"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      class="row-content stack"
                      role="presentation"
                      style="
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        background-color: #ffffff;
                        color: #000000;
                        width: 640px;
                      "
                      width="640"
                    >
                      <tbody>
                        <tr>
                          <td
                            class="column column-1"
                            style="
                              mso-table-lspace: 0pt;
                              mso-table-rspace: 0pt;
                              font-weight: 400;
                              text-align: left;
                              vertical-align: top;
                              border-top: 0px;
                              border-right: 0px;
                              border-bottom: 0px;
                              border-left: 0px;
                            "
                            width="100%"
                          >
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-1"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 5px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                    padding-top: 20px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 12px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 14.399999999999999px;
                                        color: #555555;
                                        line-height: 1.2;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          font-size: 16px;
                                          text-align: center;
                                          mso-line-height-alt: 19.2px;
                                        "
                                      >
                                        <span style="font-size: 24px;color: #003188;"><strong>Big Caters</strong></span>
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              class="text_block block-2"
                              role="presentation"
                              style="
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                                word-break: break-word;
                              "
                              width="100%"
                            >
                              <tr>
                                <td
                                  class="pad"
                                  style="
                                    padding-bottom: 25px;
                                    padding-left: 40px;
                                    padding-right: 40px;
                                  "
                                >
                                  <div style="font-family: sans-serif">
                                    <div
                                      class=""
                                      style="
                                        font-size: 12px;
                                        font-family: Trebuchet MS, Lucida Grande,
                                          Lucida Sans Unicode, Lucida Sans,
                                          Tahoma, sans-serif;
                                        mso-line-height-alt: 18px;
                                        color: #555555;
                                        line-height: 1.5;
                                      "
                                    >
                                      <p
                                        style="
                                          margin: 0;
                                          text-align: center;
                                          mso-line-height-alt: 24px;
                                        "
                                      >
                                        <span style="font-size: 16px"><span style="color: #6d89bc">B4 - 300, Second Floor, Rohini, Sector-8, Delhi</span></span>
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- End -->
  </body>
</html>
';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;
    //Enable SMTP authentication
    $mail->SMTPAuth   = true;
    $mail->Username   = $username;
    $mail->Password   = $password;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->Port       = $port;

    //Recipients
    $mail->setFrom($email, $name);

    foreach ($mails as $_mail => $_name) {
      $mail->addAddress($_mail, $_name);
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject.'('.$name.')';
    $mail->Body    = $htmlBody;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NotificationController extends Controller
{
      // Updated to Guzzle HTTP POST Request by Furkan on 26/05/2023
      public function sendWhatsAppNotification($name, $mobile_no, $template_name)
      {
            Log::info('sendWhatsAppNotification');

            if (is_null($name)) {
                  $name = ' member';
            } else {
                  $full_name = explode(" ", $name);
                  $name = $full_name[0];
            }
            Log::info($name);

            $url = "https://api.au.freshchat.com/v2/outbound-messages/whatsapp";

            $client = new Client();
            $token = 'eyJraWQiOiJjdXN0b20tb2F1dGgta2V5aWQiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmcmVzaGNoYXQiLCJzdWIiOiIyZThiNzQ0NS0xOGUyLTRhNmUtYjU1Yi0xNGEzNzhlZTU1NzAiLCJjbGllbnRJZCI6ImZjLWFjMTVlZjViLWNmNGEtNGE2Yy1hNzRiLTdlMmJiMTVlZTgwYiIsInNjb3BlIjoiYWdlbnQ6cmVhZCBhZ2VudDpjcmVhdGUgYWdlbnQ6dXBkYXRlIGFnZW50OmRlbGV0ZSBjb252ZXJzYXRpb246Y3JlYXRlIGNvbnZlcnNhdGlvbjpyZWFkIGNvbnZlcnNhdGlvbjp1cGRhdGUgbWVzc2FnZTpjcmVhdGUgbWVzc2FnZTpnZXQgYmlsbGluZzp1cGRhdGUgcmVwb3J0czpmZXRjaCByZXBvcnRzOmV4dHJhY3QgcmVwb3J0czpyZWFkIHJlcG9ydHM6ZXh0cmFjdDpyZWFkIGFjY291bnQ6cmVhZCBkYXNoYm9hcmQ6cmVhZCB1c2VyOnJlYWQgdXNlcjpjcmVhdGUgdXNlcjp1cGRhdGUgdXNlcjpkZWxldGUgb3V0Ym91bmRtZXNzYWdlOnNlbmQgb3V0Ym91bmRtZXNzYWdlOmdldCBtZXNzYWdpbmctY2hhbm5lbHM6bWVzc2FnZTpzZW5kIG1lc3NhZ2luZy1jaGFubmVsczptZXNzYWdlOmdldCBtZXNzYWdpbmctY2hhbm5lbHM6dGVtcGxhdGU6Y3JlYXRlIG1lc3NhZ2luZy1jaGFubmVsczp0ZW1wbGF0ZTpnZXQgZmlsdGVyaW5ib3g6cmVhZCBmaWx0ZXJpbmJveDpjb3VudDpyZWFkIHJvbGU6cmVhZCBpbWFnZTp1cGxvYWQiLCJpc3MiOiJmcmVzaGNoYXQiLCJ0eXAiOiJCZWFyZXIiLCJleHAiOjIwMDAzNzM4MTEsImlhdCI6MTY4NDc1NDYxMSwianRpIjoiMWJjZjA3OWItNDNhMC00ZmZkLWE5NDctNTZkYTYzZTNhYjFlIn0.AEnuNACeq5GdA8f5pE3wbBg-R_EX6zvSBlXla2nfMlI';

            try {
                    $response = $client->post($url, [
                        'headers' => [
                              'Content-Type' => 'application/json',
                              'Authorization' => 'Bearer '.$token,
                        ],
                        'json' => [
                              'from' => [
                                    'phone_number' => '+919663488580',
                              ],
                              'provider' => 'whatsapp',
                              'to' => [
                                    [
                                          'phone_number' => $mobile_no,
                                    ],
                              ],
                              'data' => [
                                    'message_template' => [
                                          'storage' => 'conversation',
                                          'template_name' => $template_name,
                                          'namespace' => '3a312855_95f9_44cb_a80f_61ad7e7638dd',
                                          'language' => [
                                                'policy' => 'deterministic',
                                                'code' => 'en',
                                          ],
                                          'rich_template_data' => [
                                                'body' => [
                                                      'params' => [
                                                            [
                                                                  'data' => $name,
                                                            ],
                                                      ],
                                                ],
                                          ],
                                    ],
                              ],
                        ],
                    ]);

                  $resp = $response->getBody()->getContents();
                  // Log::info('Response: ' . $resp);
            } catch (RequestException $e) {
                  // Handle request exception
                  Log::error('From WA_Notification - Error: ' . $e->getMessage());
            }
      }

}

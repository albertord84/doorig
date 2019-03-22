<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;
use business\Response\ResponseArrayObject;
use business\Visitor;

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
    }

    public function index() {
        echo 'OK';
    }

    public function vindi_notification_post() {
        try {
            //1. Get and Save Raw Content Input String
            $post_str = file_get_contents('php://input');
            $path = __dir__ . '/../../../logs/vindi/';
            $file = $path . "vindi_notif_post-" . date("d-m-Y") . ".log";
            $result = file_put_contents($file, "\n\n", FILE_APPEND);
            $result = file_put_contents($file, serialize($post_str), FILE_APPEND);
            
            //2. Converto Raw Object to string
            $post = urldecode($post_str);
            $post = json_decode($post);

            //3. Process input object
            if (isset($post->event) && isset($post->event->type)) {
                //$Client = new Client();
                //$Client->M
                // Recurrence created succefully
                if ($post->event->type == "charge_created") {
                    $gateway_client_id = $post->event->data->charge->customer->id;
                    // Activate User
                }
                // Bill paid succefully
                if (isset($post->event) && isset($post->event->type) && $post->event->type == "bill_paid") {
                    if (isset($post->event->data) && isset($post->event->data->bill) && $post->event->data->bill->status = "paid") {
                        $result = file_put_contents($file, "\n bill_paid DETECTED!!:\n", FILE_APPEND);
                        // Activate User
                        //$gateway_client_id = $post->event->data->bill->customer->id;
                        $gateway_payment_key = $post->event->data->bill->subscription->id;
                        //1. activar cliente
                        $this->load->model('class/user_model');
                        $this->load->model('class/user_status');
                        $this->load->model('class/client_model');
                        //$client_id = $this->client_model->get_client_id_by_gateway_client_id($gateway_client_id);
                        $client_id = $this->client_model->get_client_id_by_gateway_payment_key($gateway_payment_key);
                        if ($client_id) {
                            $this->user_model->update_user($client_id, array(
                                'status_id' => user_status::ACTIVE));
                            $result = file_put_contents($file, "$client_id: ACTIVED" . "\n\n", FILE_APPEND);
                            //2. pay_day un mes para el frente
                            $this->client_model->update_client(
                                    $client_id, array('pay_day' => strtotime("+1 month", time())));
                            $result = file_put_contents($file, "$client_id: +1 month from now" . "\n\n\n", FILE_APPEND);
                        } else {
                            $result = file_put_contents($file, "Subscription($gateway_payment_key): NOT FOUND HERE!!!" . "\n\n\n", FILE_APPEND);
                        }
                        //die("Activate client -> Payment done!! -> Dia da cobrança um mês para frente");
                    }
                }
            } else {
                $result = file_put_contents($file, "\nERROR:\n", FILE_APPEND);
                $result = file_put_contents($file, $post, FILE_APPEND);
                $result = file_put_contents($file, "\nERROR END\n", FILE_APPEND);
                echo "FAIL";
                return;
            }
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            $result = file_put_contents($file, "$client_id: " . $exc->getTraceAsString() . "\n\r\n\r", FILE_APPEND);
            return;
        }

        if ($result === FALSE) {
            echo "FAIL";
            return;
        }
        echo "OK";
    }

}

//s:2776:"{"event":{"type":"bill_paid","created_at":"2019-03-21T10:05:26.946-03:00","data":{"bill":{"id":40492589,"code":null,"amount":"79.9","installments":1,"status":"paid","seen_at":null,"billing_at":null,"due_at":null,"url":"https://app.vindi.com.br/customer/bills/40492589?token=3f34de5b-2542-47b0-8361-024982c56fa1","created_at":"2019-03-21T10:05:21.000-03:00","updated_at":"2019-03-21T10:05:26.718-03:00","bill_items":[{"id":48434460,"amount":"79.9","quantity":1,"pricing_range_id":null,"description":null,"pricing_schema":{"id":6214713,"short_format":"R$ 79,90","price":"79.9","minimum_price":null,"schema_type":"flat","pricing_ranges":[],"created_at":"2018-10-29T20:58:44.000-03:00"},"product":{"id":230843,"name":"Follows Br 4","code":null},"product_item":{"id":8598273,"product":{"id":230843,"name":"Follows Br 4","code":null}},"discount":null}],"charges":[{"id":39399679,"amount":"79.9","status":"paid","due_at":"2019-03-21T23:59:59.000-03:00","paid_at":"2019-03-21T10:05:26.000-03:00","installments":1,"attempt_count":1,"next_attempt":null,"print_url":null,"created_at":"2019-03-21T10:05:23.000-03:00","updated_at":"2019-03-21T10:05:26.000-03:00","last_transaction":{"id":66013106,"transaction_type":"capture","status":"success","amount":"79.9","installments":1,"gateway_message":"Aprovado","gateway_response_code":null,"gateway_authorization":"","gateway_transaction_id":"83adbbfd-3579-4b81-853e-81cb4a3ae499","gateway_response_fields":{"stone_id_rcpt_tx_id":"18093121075291"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T10:05:25.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":10804945,"holder_name":"CONRADO R F LEITE","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2026-02-28T23:59:59.000-03:00","card_number_first_six":"553636","card_number_last_four":"1766","token":"851ff6c7-cd8e-4866-8ea3-d9c1003d2b3f","created_at":"2019-02-21T13:24:42.000-03:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"}}],"customer":{"id":9440457,"name":"CONRADO R F LEITE","email":"conrado.leite@cervejariadilema.com.br","code":null},"period":{"id":22892414,"billing_at":"2019-03-21T00:00:00.000-03:00","cycle":2,"start_at":"2019-03-21T00:00:00.000-03:00","end_at":"2019-04-20T23:59:59.000-03:00","duration":2678399},"subscription":{"id":6342783,"code":null,"plan":{"id":64388,"name":"Follows Br 4","code":null},"customer":{"id":9440457,"name":"CONRADO R F LEITE","email":"conrado.leite@cervejariadilema.com.br","code":null}},"metadata":{},"payment_profile":null,"payment_condition":null}}}}";bill_paid DETECTED!!:


//s:1633:"{"event":{"type":"charge_rejected","created_at":"2019-03-21T10:56:12.087-03:00","data":{"charge":{"id":38938540,"amount":"90.0","status":"pending","due_at":"2019-03-15T23:59:59.000-03:00","paid_at":null,"installments":1,"attempt_count":3,"next_attempt":"2019-03-24T00:00:00.000-03:00","print_url":null,"created_at":"2019-03-15T09:37:18.000-03:00","updated_at":"2019-03-21T10:56:11.000-03:00","last_transaction":{"id":66029887,"transaction_type":"authorization","status":"rejected","amount":"90.0","installments":1,"gateway_message":"Cartão inválido","gateway_response_code":"1011","gateway_authorization":"","gateway_transaction_id":"2dc27513-1d78-4c82-8342-6ebb8b70005a","gateway_response_fields":{"stone_id_tx_id_tx_ref":"66029887","stone_id_tx_rcpt_tx_id":"18093121370103"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T10:56:10.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":8886587,"holder_name":"MAIJA ARMANEVA","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2020-11-30T23:59:59.000-02:00","card_number_first_six":"535549","card_number_last_four":"3594","token":"b69be14f-de96-48cf-8d07-3636ce9a0abd","created_at":"2018-10-08T19:00:28.000-03:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"},"bill":{"id":40026511,"code":null},"customer":{"id":8122405,"name":"MAIJA ARMANEVA","email":"armaneva.maija@gmail.com","code":null}}}}}";


//s:2748:"{"event":{"type":"bill_created","created_at":"2019-03-21T11:28:33.022-03:00","data":{"bill":{"id":40505269,"code":null,"amount":"79.9","installments":1,"status":"paid","seen_at":null,"billing_at":null,"due_at":null,"url":"https://app.vindi.com.br/customer/bills/40505269?token=962d4d84-b9d7-42e2-bf1b-0d1be0245f11","created_at":"2019-03-21T11:28:26.000-03:00","updated_at":"2019-03-21T11:28:31.000-03:00","bill_items":[{"id":48450002,"amount":"79.9","quantity":1,"pricing_range_id":null,"description":null,"pricing_schema":{"id":6214713,"short_format":"R$ 79,90","price":"79.9","minimum_price":null,"schema_type":"flat","pricing_ranges":[],"created_at":"2018-10-29T20:58:44.000-03:00"},"product":{"id":230843,"name":"Follows Br 4","code":null},"product_item":{"id":8258052,"product":{"id":230843,"name":"Follows Br 4","code":null}},"discount":null}],"charges":[{"id":39412002,"amount":"79.9","status":"paid","due_at":"2019-03-21T23:59:59.000-03:00","paid_at":"2019-03-21T11:28:31.000-03:00","installments":1,"attempt_count":1,"next_attempt":null,"print_url":null,"created_at":"2019-03-21T11:28:28.000-03:00","updated_at":"2019-03-21T11:28:31.000-03:00","last_transaction":{"id":66040773,"transaction_type":"capture","status":"success","amount":"79.9","installments":1,"gateway_message":"Aprovado","gateway_response_code":null,"gateway_authorization":"","gateway_transaction_id":"54437a7d-47d6-493a-84b8-0ed6442e1eaa","gateway_response_fields":{"stone_id_rcpt_tx_id":"18093121581064"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T11:28:30.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":10352760,"holder_name":"LEANDRO D GARCIA","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2026-10-31T23:59:59.000-03:00","card_number_first_six":"514945","card_number_last_four":"2204","token":"a23bc727-22b2-4c7a-9eb7-364635d317bd","created_at":"2019-01-21T16:16:49.000-02:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"}}],"customer":{"id":6996507,"name":"LEANDRO D GARCIA","email":"lemack.garcia@gmail.com","code":null},"period":{"id":22892403,"billing_at":"2019-03-21T00:00:00.000-03:00","cycle":3,"start_at":"2019-03-21T00:00:00.000-03:00","end_at":"2019-04-20T23:59:59.000-03:00","duration":2678399},"subscription":{"id":6066951,"code":null,"plan":{"id":64388,"name":"Follows Br 4","code":null},"customer":{"id":6996507,"name":"LEANDRO D GARCIA","email":"lemack.garcia@gmail.com","code":null}},"metadata":{},"payment_profile":null,"payment_condition":null}}}}";


//s:1577:"{"event":{"type":"charge_created","created_at":"2019-03-21T11:28:32.652-03:00","data":{"charge":{"id":39412002,"amount":"79.9","status":"paid","due_at":"2019-03-21T23:59:59.000-03:00","paid_at":"2019-03-21T11:28:31.000-03:00","installments":1,"attempt_count":1,"next_attempt":null,"print_url":null,"created_at":"2019-03-21T11:28:28.000-03:00","updated_at":"2019-03-21T11:28:31.000-03:00","last_transaction":{"id":66040773,"transaction_type":"capture","status":"success","amount":"79.9","installments":1,"gateway_message":"Aprovado","gateway_response_code":null,"gateway_authorization":"","gateway_transaction_id":"54437a7d-47d6-493a-84b8-0ed6442e1eaa","gateway_response_fields":{"stone_id_rcpt_tx_id":"18093121581064"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T11:28:30.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":10352760,"holder_name":"LEANDRO D GARCIA","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2026-10-31T23:59:59.000-03:00","card_number_first_six":"514945","card_number_last_four":"2204","token":"a23bc727-22b2-4c7a-9eb7-364635d317bd","created_at":"2019-01-21T16:16:49.000-02:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"},"bill":{"id":40505269,"code":null},"customer":{"id":6996507,"name":"LEANDRO D GARCIA","email":"lemack.garcia@gmail.com","code":null}}}}}";
<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'core/MainController.php';
require_once APPPATH . 'iyzipay/IyzipayBootstrap.php';
IyzipayBootstrap::init();
class Memberships extends MainController
{
    public function check_auth()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function create_memberships_packages()
    {
        $this->check_auth('create_memberships_packages');

        $title['title'] = $this->lang->line('create_memberships_packages');

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/create_memberships_packages');
        $this->load->view('templates/footer');
    }

    public function create_memberships()
    {
        $this->check_auth('create_membership_packages');

        $title['title'] = $this->lang->line('create_membership');
        $memberships['membershipTypes'] = $this->memberships_model->get_all_memberships_packages();
        $memberships['vendors'] = $this->memberships_model->get_all_vendor();

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/create_memberships', $memberships);
        $this->load->view('templates/footer');
    }

    public function all_memberships_packages()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('all_memberships');
        $memberships['memberships'] = $this->memberships_model->get_all_memberships_packages();

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/all-memberships', $memberships);
        $this->load->view('templates/footer');
    }

    public function membershiplans()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('all_memberships');
        $memberships['memberships'] = $this->memberships_model->get_all_memberships_packages();
        $memberships['banks'] = $this->memberships_model->get_bank_details();
        $this->load->view('templates/header', $title);
        $this->load->view('membershiplans', $memberships);
        $this->load->view('templates/footer');
    }

    public function register_bankinfos()
    {
        $validator = array('success' => false, 'messages' => array());

        $transaction_data = array(
            'membership_type' => $this->input->post('membership_type'),
            'payment_type' => $this->input->post('payment_type'),
            'amount' => $this->input->post('amount')
        );
        $search_active_membership = $this->memberships_model->search_active_membership($this->session->userdata('user_id'));
        $search_passive_membership = $this->memberships_model->search_passive_membership($this->session->userdata('user_id'));
        if($search_active_membership["datediff"] > 3)
        {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("you_have_already_memberships");
        } else if( isset($search_passive_membership) && $search_passive_membership["addedDateDiff"] < 7)
        {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("you_have_already_memberships_please_ask_admin");
        } else {
            $transaction_id = $this->memberships_model->insert_transactions($transaction_data);
            if($transaction_id > 0)
            {
                $membership_data = array(
                    'membership_type' => $this->input->post("membership_type"),
                    'vendor_id' => $this->session->userdata("user_id"),
                    'transaction_id' => $transaction_id,
                );
                $membership_data = $this->memberships_model->insert_memberships($membership_data);
                if ($membership_data) {
                    $validator['success'] = true;
                    $validator['messages'] = $this->lang->line("successfully_added");
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line("something_went_wrong_please");
                }
            } else {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("something_went_wrong_please");
            }
        }

        echo json_encode($validator);
    }

    public function membership_info($membership_id)
    {
        $this->check_auth('membership_info');

        $result = $this->memberships_model->get_info($membership_id);

        if (!is_null($result)) {
            $membership['membership'] = $this->memberships_model->get_info($membership_id);

            $membership['info'] = array(
                'membership_id' => $result['membership_id'],
                'name' => $result['name'],
                'amount' => $result['amount'],
                'days' => $result['days'],
                'home_limit' => $result['home_limit'],
                'build_limit' => $result['build_limit'],
                'contract_limit' => $result['contract_limit'],
            );

            $title['title'] = $this->lang->line('membership_') . $result['name'];

            $this->load->view('templates/header', $title);
            $this->load->view('memberships/update_memberships', $membership);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url('error404'));
        }
    }

    public function register_memberships_packages()
    {
        $validator = array('success' => false, 'messages' => array());

        $memberships_data = array(
            'name' => $this->input->post('name'),
            'home_limit' => $this->input->post('home_limit'),
            'build_limit' => $this->input->post('build_limit'),
            'contract_limit' => $this->input->post('contract_limit'),
            'amount' => $this->input->post('amount'),
            'days' => $this->input->post('days'),
        );

        $memberships_data = $this->memberships_model->insert_memberships_packages($memberships_data);

        if ($memberships_data) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line("successfully_added");
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("something_went_wrong_please");
        }
        echo json_encode($validator);
    }

    public function credit_card_pay()
    {
        $validator = array('success' => false, 'messages' => array());

        $cardholdername = $this->input->post('cardholdername');
        $cardnumber = $this->input->post('cardnumber');
        $expiredmonth = $this->input->post('expiredmonth');
        $expiredyear = $this->input->post('expiredyear');
        $cvc = $this->input->post('cvc');
        $amount = $this->input->post("amount");

        $options = new \Iyzipay\Options();
        $options->setApiKey("xwdonqAQzqpFz4xCjuHyxw9S3lZlkkLV");
        $options->setSecretKey("DCenEmajZXRC5AlVZ8ev9KSNddizGqXg");
        //$options->setBaseUrl("https://sandbox-api.iyzipay.com");
        $options->setBaseUrl("https://api.iyzipay.com");

        /*$iyzipayResource = \Iyzipay\Model\ApiTest::retrieve($options);

        # print result
        print_r($iyzipayResource);*/
        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1");
        //$request->setPaidPrice($amount);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName($cardholdername);
        $paymentCard->setCardNumber($cardnumber);
        $paymentCard->setExpireMonth($expiredmonth);
        $paymentCard->setExpireYear($expiredyear);
        $paymentCard->setCvc($cvc);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($this->session->userdata('user_id'));
        $buyer->setName($this->session->userdata('username'));
        $buyer->setSurname($this->session->userdata('fullname'));
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail($this->session->userdata('email'));
        $buyer->setIdentityNumber($this->session->userdata('identity'));
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress($this->session->userdata('address'));
        $buyer->setIp("85.34.78.112");
        $buyer->setCity($this->session->userdata('address'));
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Mobsy");
        $shippingAddress->setCity($this->session->userdata('address'));
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($this->session->userdata('address'));
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Mobsy");
        $billingAddress->setCity($this->session->userdata('address'));
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress($this->session->userdata('address'));
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId($this->input->post('membership_type'));
        $firstBasketItem->setName("Membership");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        //$firstBasketItem->setPrice($amount);
        $firstBasketItem->setPrice("1");
        $basketItems[0] = $firstBasketItem;

        $request->setBasketItems($basketItems);

        # make request
        $payment = \Iyzipay\Model\Payment::create($request, $options);
        # print response
        
        $payment = json_decode($payment);
        
        if($payment && $payment->status == "success")
        {
            $transaction_data = array(
                'membership_type' => $this->input->post('membership_type'),
                'payment_type' => 'Credit Card',
                'amount' => $amount,
            );
            $search_active_membership = $this->memberships_model->search_active_membership($this->session->userdata('user_id'));
            $search_passive_membership = $this->memberships_model->search_passive_membership($this->session->userdata('user_id'));
            if($search_active_membership && $search_active_membership["datediff"] > 3)
            {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("you_have_already_memberships");
            } else if( isset($search_passive_membership) && $search_passive_membership["addedDateDiff"] < 7)
            {
                $validator['success'] = false;
                $validator['messages'] = $this->lang->line("you_have_already_memberships_please_ask_admin");
            } else {
                $transaction_id = $this->memberships_model->insert_transactions($transaction_data);
                if($transaction_id > 0)
                {
                    $membership_data = array(
                        'membership_type' => $this->input->post("membership_type"),
                        'vendor_id' => $this->session->userdata("user_id"),
                        'transaction_id' => $transaction_id,
                    );
                    $membership_data = $this->memberships_model->insert_memberships($membership_data);
                    if ($membership_data) {
                        $validator['success'] = true;
                        $validator['messages'] = $this->lang->line("successfully_added");
                    } else {
                        $validator['success'] = false;
                        $validator['messages'] = $this->lang->line("something_went_wrong_please");
                    }
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = $this->lang->line("something_went_wrong_please");
                }
            }
        } else
        {
            $validator['success'] = false;
            $validator['messages'] = $payment->errorMessage;
        }
        

        echo json_encode($validator);
    }

    public function register_memberships()
    {
        $validator = array('success' => false, 'messages' => array());

        $memberships_data = array(
            'membership_type' => $this->input->post('membership_type'),
            'vendor_id' => $this->input->post('vendor_id'),
            'added_date' => $this->input->post('added_date'),
            'expired_date' => $this->input->post('expired_date'),
        );

        $memberships_data = $this->memberships_model->insert_memberships($memberships_data);

        if ($memberships_data) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line("successfully_added");
        } else {
            $validator['success'] = false;
            $validator['messages'] = $this->lang->line("something_went_wrong_please");
        }
        echo json_encode($validator);
    }

    public function update_memberships_packages()
    {
        $validator = array('success' => false, 'messages' => array());
        $membership_data = array(
            'membership_id' => $this->input->post('membership_id'),
            'name' => $this->input->post('name'),
            'contract_limit' => $this->input->post('contract_limit'),
            'home_limit' => $this->input->post('home_limit'),
            'build_limit' => $this->input->post('build_limit'),
            'amount' => $this->input->post('amount'),
            'days' => $this->input->post('days'),
        );

        $update_membership = $this->memberships_model->update_memberships_packages($membership_data);

        if ($update_membership) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line("successfully_updated");
        }

        echo json_encode($validator);
    }

    public function update_memberships()
    {
        $validator = array('success' => false, 'messages' => array());
        $membership_data = array(
            'membership_id' => $this->input->post('membership_id'),
            'membership_type' => $this->input->post('membership_type'),
            'vendor_id' => $this->input->post('vendor_id'),
            'added_date' => $this->input->post('added_date'),
            'expired_date' => $this->input->post('expired_date'),
        );

        $update_membership = $this->memberships_model->update_memberships($membership_data);

        if ($update_membership) {
            $validator['success'] = true;
            $validator['messages'] = $this->lang->line("successfully_updated");
        }

        echo json_encode($validator);
    }

    public function delete_memberships_packages()
    {
        $result = $this->memberships_model->delete_memberships_packages($this->input->post('membership_id'));
        if ($result) {
            echo $this->lang->line('all_records_has_been_deleted');
        } else {
            echo $this->lang->line('false');
        }
    }

    public function delete_memberships()
    {
        $result = $this->memberships_model->delete_memberships($this->input->post('membership_id'));
        if ($result) {
            echo $this->lang->line('all_records_has_been_deleted');
        } else {
            echo $this->lang->line('false');
        }
    }

    public function actived_memberships()
    {
        $result = $this->memberships_model->active_memberships($this->input->post('membership_id'));
        if ($result) {
            echo $this->lang->line('this_memberships_has_been_actived');
        } else {
            echo $this->lang->line('false');
        }
    }


    public function block_memberships()
    {
        $result = $this->memberships_model->block_memberships($this->input->post('membership_id'));
        if ($result) {
            echo $this->lang->line('all_records_has_been_deleted');
        } else {
            echo $this->lang->line('false');
        }
    }

    public function delete_transactions()
    {
        $result = $this->memberships_model->delete_transactions($this->input->post('transaction_id'));
        if ($result) {
            echo $this->lang->line('all_records_has_been_deleted');
        } else {
            echo $this->lang->line('false');
        }
    }

    public function active_memberships()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('active_memberships');
        $memberships['memberships'] = $this->memberships_model->get_active_memberships();
        $memberships['membershipTypes'] = $this->memberships_model->get_all_memberships_packages();
        $memberships['vendors'] = $this->memberships_model->get_all_vendor();

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/active-memberships', $memberships);
        $this->load->view('templates/footer');
    }

    public function terms_and_conditions()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('terms_and_conditions');

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/terms-and-conditions');
        $this->load->view('templates/footer');
    }

	public function privacy_policy()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('privacy_policy');

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/privacy-policy');
        $this->load->view('templates/footer');
    }

    public function about_us()
      {
          $this->check_auth('create_memberships');

          $title['title'] = $this->lang->line('about_us');

          $this->load->view('templates/header', $title);
          $this->load->view('memberships/about-us');
          $this->load->view('templates/footer');
      }

	public function kvkk()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('kvkk');

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/kvkk');
        $this->load->view('templates/footer');
    }
    public function passive_memberships()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('passive_memberships');
        $memberships['memberships'] = $this->memberships_model->get_passive_memberships();
        $memberships['membershipTypes'] = $this->memberships_model->get_all_memberships_packages();
        $memberships['vendors'] = $this->memberships_model->get_all_vendor();

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/passive-memberships', $memberships);
        $this->load->view('templates/footer');
    }

    public function expired_memberships()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('expired_memberships');
        $memberships['memberships'] = $this->memberships_model->get_expired_memberships();

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/expired-memberships', $memberships);
        $this->load->view('templates/footer');
    }

    public function transactions()
    {
        $this->check_auth('create_memberships');

        $title['title'] = $this->lang->line('transactions');
        $transactions['transactions'] = $this->memberships_model->get_transactions();

        $this->load->view('templates/header', $title);
        $this->load->view('memberships/transactions', $transactions);
        $this->load->view('templates/footer');
    }
}

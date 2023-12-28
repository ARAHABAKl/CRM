<?php
class AmoCRM {
    private $domain;
    private $clientId;
    private $clientSecret;
    private $redirectUri;
    private $code;
    private $price;

    public function __construct($domain, $clientId, $clientSecret, $redirectUri, $code, $price) {
        $this->domain = $domain;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->code = $code;
        $this->price = $price;
    }

    public function createContact($name, $email, $phone, $price) {
        // Здесь нужно реализовать создание контакта в AmoCRM
    }

    public function createLead($name, $price, $contactId) {
        // Здесь нужно реализовать создание сделки в AmoCRM
    }
}

$data = json_decode(file_get_contents('php://input'), true);

$amoCRM = new AmoCRM('localhost', 'your-client-id',  'your-redirect-uri', 'your-code');

$contact = $amoCRM->createContact($data['name'], $data['email'], $data['phone']);
$lead = $amoCRM->createLead($data['name'], $data['price'], $contact['id']);

echo json_encode(['contact' => $contact, 'lead' => $lead]);
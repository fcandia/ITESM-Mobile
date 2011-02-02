<?php

class DrupalContactsListDataController extends ContactsListDataController
{
    protected $DEFAULT_PARSER_CLASS = 'DrupalContactsDataParser';
    protected $contactsLoaded = FALSE;

    protected function loadContacts() {
        if(!$this->contactsLoaded) {
            $data = $this->getData();
            $contacts = $this->parseData($data);
            $this->primaryContacts = $contacts['primary'];
            $this->secondaryContacts = $contacts['secondary'];
            $this->contactsLoaded = TRUE;
        }
    }

    protected function init($args) {
        $args['BASE_URL'] = $args['contacts']['DRUPAL_SERVER_URL'] .
            "/emergency-contacts-v" . $args['contacts']['FEED_VERSION'];
        parent::init($args);
    }
}
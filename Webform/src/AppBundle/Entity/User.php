<?php
    namespace AppBundle\Entity;

    class User
    {
        protected $name;
        protected $country;
        protected $customerID;

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getCountry()
        {
            return $this->country;
        }

        public function setCountry($country)
        {
            $this->country = $country;
        }

        public function getCustomerID()
        {
            return $this->customerID;
        }

        public function setCustomerID($customerID)
        {
            $this->customerID = $customerID;
        }

        public function __toString()
        {
            return $this->name . '_' . $this->country . '_' . $this->customerID;
        }
    }
?>
<?php
    namespace AppBundle\Entity;

    class User
    {
        protected $name;
        protected $country;
        protected $customerID;
        protected $id;

        public function getId (){
            return $this->id;
        }

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

        public function getCustomerId()
        {
            return $this->customerID;
        }

        public function setCustomerId($customerID)
        {
            $this->customerID = $customerID;
        }

        public function __toString()
        {
            return $this->name . '_' . $this->country . '_' . $this->customerID;
        }
    }
?>
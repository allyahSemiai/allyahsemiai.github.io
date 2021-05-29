<?php 

    class contact{
        // need dataBase class to create connection 
        function __construct(){
            $this->connection=new dataBase('localhost','portfolio_3wc', 'root', "");
        }

        protected function verify_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function verifyEmail($email){
            return $email=filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        // in this case it tooks three arguments, if we need to send more we can use an array
        public function create_contact($name, $email,$subject, $message){
            $name=$this->verify_data($name);
            $subject=$this->verify_data($subject);
            $message=$this->verify_data($message);

            if($this->verifyEmail($email)==true){
                
                    if(!empty($name) && !empty($subject) && !empty($message)){
                        $this->connection->interaction_dataBase_without_fetch("INSERT INTO contacts( name, email, subject, message) VALUES (?,?,?,?)",[$name, $email, $subject, $message]);
                        return "thanks for your mail, I'll respond you as soon as possible";
                    }else{
                        return 'you must fill all of the fields';
                    }
                    
            }else{
                return "this email is not valid";
            }
        }

    }

<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Model EmailQueue
 *
 * @author Luiz Claudio
 */
class Model_EmailQueue extends ORM {

	// Table name, this value comes from config file of module through constructor method
	protected $_table_name	= '';

	/**
	 * Sets the table name and returns the parent constructor
	 *
	 * @author Luiz Claudio
	 * @param  $id
	 * @return parent::__construct
	 */
	public function __construct($id = NULL) {

		// Gets the configuration
		$config = Kohana::$config->load('emailqueue')->as_array();
		extract($config, EXTR_SKIP);

		// Sets the table name
		$this->_table_name	= $tablename;

		return parent::__construct($id);
	}

	/**
	 * Sets the subject, message content and mime type of email queue
	 *
	 * @param  string $subject
	 * @param  string $message
	 * @param  string $type
	 * @return Model_EmailQueue
	 */
	public function add($subject = NULL, $message = NULL, $type = 'text/html'){
		$this->setSubject($subject);
		$this->setMessage($message);
		$this->setType($type);
		return $this;
	}

	/**
	 * Sets the subject for the email queue
	 *
	 * @author Luiz Claudio
	 * @param  string  message $subject
	 * @return Model_EmailQueue
	 */
	public function setSubject($subject){
		$this->subject		= $subject;
		return $this;
	}

	/**
	 * Sets the message content for the email queue
	 *
	 * @author Luiz Claudio
	 * @param  string  $message body
	 * @return Model_EmailQueue
	 */
	public function setMessage($message){
		$this->message		= $message;
		return $this;
	}

	/**
	 * Sets the mime type for the email queue
	 *
	 * @author Luiz Claudio
	 * @param  string  body mime $type
	 * @return Model_EmailQueue
	 */
	public function setType($type){
		$this->type			= $type;
		return $this;
	}

	/**
	 * Sets the email address and the name from
	 *
	 * @author Luiz Claudio
	 * @param  string $email from
	 * @param  string $name from
	 * @return Model_EmailQueue
	 */
	public function setFrom($email, $name){
		$this->emailfrom	= $email;
		$this->namefrom		= $name;
		return $this;
	}

	/**
	 * Sets the email address and the name to
	 *
	 * @author Luiz Claudio
	 * @param  string $email to
	 * @param  string $name to
	 * @return Model_EmailQueue
	 */
	public function setTo($email, $name){
		$this->emailto		= $email;
		$this->nameto		= $name;
		return $this;
	}

	/**
	 * Sets the email address and the name to reply
	 *
	 * @author Luiz Claudio
	 * @param  string $email reply
	 * @param  string $name reply
	 * @return Model_EmailQueue
	 */
	public function setReply_to($email, $name){
		$this->emailreply	= $email;
		$this->namereply	= $name;
		return $this;
	}

}
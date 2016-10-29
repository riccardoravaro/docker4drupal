<?php

namespace Egulias\EmailValidator;

/**
 * EmailValidator
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
<<<<<<< HEAD
class EmailValidator
{
=======
class EmailValidator implements EmailValidatorInterface
{
    /**
     * Critical validation errors used to indicate that
     * an email address is invalid:
     */
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    const ERR_CONSECUTIVEATS     = 128;
    const ERR_EXPECTING_DTEXT    = 129;
    const ERR_NOLOCALPART        = 130;
    const ERR_NODOMAIN           = 131;
    const ERR_CONSECUTIVEDOTS    = 132;
    const ERR_ATEXT_AFTER_CFWS   = 133;
<<<<<<< HEAD
    const ERR_ATEXT_AFTER_QS     = 134;
    const ERR_ATEXT_AFTER_DOMLIT = 135;
    const ERR_EXPECTING_QPAIR    = 136;
    const ERR_EXPECTING_ATEXT    = 137;
    const ERR_EXPECTING_QTEXT    = 138;
    const ERR_EXPECTING_CTEXT    = 139;
    const ERR_BACKSLASHEND       = 140;
    const ERR_DOT_START          = 141;
    const ERR_DOT_END            = 142;
    const ERR_DOMAINHYPHENSTART  = 143;
    const ERR_DOMAINHYPHENEND    = 144;
    const ERR_UNCLOSEDQUOTEDSTR  = 145;
    const ERR_UNCLOSEDCOMMENT    = 146;
    const ERR_UNCLOSEDDOMLIT     = 147;
=======
    const ERR_EXPECTING_QPAIR    = 136;
    const ERR_EXPECTING_ATEXT    = 137;
    const ERR_EXPECTING_CTEXT    = 139;
    const ERR_DOT_START          = 141;
    const ERR_DOT_END            = 142;
    const ERR_DOMAINHYPHENEND    = 144;
    const ERR_UNCLOSEDQUOTEDSTR  = 145;
    const ERR_UNCLOSEDCOMMENT    = 146;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    const ERR_FWS_CRLF_X2        = 148;
    const ERR_FWS_CRLF_END       = 149;
    const ERR_CR_NO_LF           = 150;
    const ERR_DEPREC_REACHED     = 151;
<<<<<<< HEAD
    const RFC5321_TLD             = 9;
    const RFC5321_TLDNUMERIC      = 10;
    const RFC5321_QUOTEDSTRING    = 11;
    const RFC5321_ADDRESSLITERAL  = 12;
    const RFC5321_IPV6DEPRECATED  = 13;
    const CFWS_COMMENT            = 17;
    const CFWS_FWS                = 18;
    const DEPREC_LOCALPART        = 33;
    const DEPREC_FWS              = 34;
    const DEPREC_QTEXT            = 35;
    const DEPREC_QP               = 36;
    const DEPREC_COMMENT          = 37;
    const DEPREC_CTEXT            = 38;
    const DEPREC_CFWS_NEAR_AT     = 49;
    const RFC5322_LOCAL_TOOLONG   = 64;
    const RFC5322_LABEL_TOOLONG   = 63;
    const RFC5322_DOMAIN          = 65;
=======
    const ERR_UNOPENEDCOMMENT    = 152;
    const ERR_ATEXT_AFTER_QS     = 134; // not in use
    const ERR_ATEXT_AFTER_DOMLIT = 135; // not in use
    const ERR_EXPECTING_QTEXT    = 138; // not in use
    const ERR_BACKSLASHEND       = 140; // not in use
    const ERR_DOMAINHYPHENSTART  = 143; // not in use
    const ERR_UNCLOSEDDOMLIT     = 147; // not in use

    /**
     * Informational validation warnings regarding unusual or
     * deprecated features found in an email address:
     */
    // Address is valid for SMTP (RFC-5321), but has unusual elements.
    const RFC5321_TLD             = 9;
    const RFC5321_QUOTEDSTRING    = 11;
    const RFC5321_ADDRESSLITERAL  = 12;
    const RFC5321_IPV6DEPRECATED  = 13;
    const RFC5321_TLDNUMERIC      = 10; // not in use
    // Address is only valid according to the broad
    // definition of RFC-5322. It is otherwise invalid.
    const RFC5322_LOCAL_TOOLONG   = 64;
    const RFC5322_LABEL_TOOLONG   = 63;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    const RFC5322_TOOLONG         = 66;
    const RFC5322_DOMAIN_TOOLONG  = 255;
    const RFC5322_DOMAINLITERAL   = 70;
    const RFC5322_DOMLIT_OBSDTEXT = 71;
    const RFC5322_IPV6_GRPCOUNT   = 72;
    const RFC5322_IPV6_2X2XCOLON  = 73;
    const RFC5322_IPV6_BADCHAR    = 74;
    const RFC5322_IPV6_MAXGRPS    = 75;
    const RFC5322_IPV6_COLONSTRT  = 76;
    const RFC5322_IPV6_COLONEND   = 77;
<<<<<<< HEAD
    const DNSWARN_NO_MX_RECORD    = 5;
    const DNSWARN_NO_RECORD       = 6;

    protected $parser;
    protected $warnings = array();
    protected $error;
=======
    const RFC5322_DOMAIN          = 65; // not in use
    // Address contains deprecated elements, but may
    // still be valid in restricted contexts.
    const DEPREC_QP               = 36;
    const DEPREC_COMMENT          = 37;
    const DEPREC_CFWS_NEAR_AT     = 49;
    const DEPREC_LOCALPART        = 33; // not in use
    const DEPREC_FWS              = 34; // not in use
    const DEPREC_QTEXT            = 35; // not in use
    const DEPREC_CTEXT            = 38; // not in use
    // Address is valid within the message,
    // but cannot be used unmodified in the envelope.
    const CFWS_COMMENT            = 17;
    const CFWS_FWS                = 18;
    // Hostname DNS checks were unsuccessful.
    const DNSWARN_NO_MX_RECORD    = 5;
    const DNSWARN_NO_RECORD       = 6;

    /**
     * @var EmailParser
     */
    protected $parser;

    /**
     * Contains any informational warnings regarding unusual/deprecated
     * features that were encountered during validation.
     *
     * @var array
     */
    protected $warnings = array();

    /**
     * If a critical validation problem is encountered, this will be
     * set to the value of one of this class's ERR_* constants.
     *
     * @var int
     */
    protected $error;

    /**
     * @var int
     */
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    protected $threshold = 255;

    public function __construct()
    {
        $this->parser = new EmailParser(new EmailLexer());
    }

<<<<<<< HEAD
=======
    /**
     * {@inheritdoc}
     */
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    public function isValid($email, $checkDNS = false, $strict = false)
    {
        try {
            $this->parser->parse((string)$email);
            $this->warnings = $this->parser->getWarnings();
        } catch (\Exception $e) {
            $rClass = new \ReflectionClass($this);
            $this->error = $rClass->getConstant($e->getMessage());
            return false;
        }

<<<<<<< HEAD
        $dns = true;
        if ($checkDNS) {
            $dns = $this->checkDNS();
        }

        if ($this->hasWarnings() && ((int) max($this->warnings) > $this->threshold)) {
            $this->error = self::ERR_DEPREC_REACHED;

            return false;
        }

        return !$strict || (!$this->hasWarnings() && $dns);
    }

    /**
     * @return boolean
=======
        $dnsProblemExists = ($checkDNS ? !$this->checkDNS() : false);

        if ($this->hasWarnings() && ((int) max($this->warnings) > $this->threshold)) {
            $this->error = self::ERR_DEPREC_REACHED;
            return false;
        }

        return ($strict ? (!$this->hasWarnings() && !$dnsProblemExists) : true);
    }

    /**
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function hasWarnings()
    {
        return !empty($this->warnings);
    }

    /**
<<<<<<< HEAD
     * @return array
=======
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
<<<<<<< HEAD
     * @return string
=======
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function getError()
    {
        return $this->error;
    }

    /**
<<<<<<< HEAD
     * @param int $threshold
     *
     * @return EmailValidator
=======
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function setThreshold($threshold)
    {
        $this->threshold = (int) $threshold;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return int
=======
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

<<<<<<< HEAD
    protected function checkDNS()
    {
        $checked = true;

        $result = checkdnsrr(trim($this->parser->getParsedDomainPart()), 'MX');

        if (!$result) {
            $this->warnings[] = self::DNSWARN_NO_RECORD;
            $checked = false;
            $this->addTLDWarnings();
        }

        return $checked;
=======
    /**
     * @return bool Whether or not an MX record exists for the
     *              email address's host name.
     */
    protected function checkDNS()
    {
        $mxRecordExists = checkdnsrr(trim($this->parser->getParsedDomainPart()), 'MX');

        if (!$mxRecordExists) {
            $this->warnings[] = self::DNSWARN_NO_RECORD;
            $this->addTLDWarnings();
        }

        return $mxRecordExists;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    protected function addTLDWarnings()
    {
        if (!in_array(self::DNSWARN_NO_RECORD, $this->warnings) &&
            !in_array(self::DNSWARN_NO_MX_RECORD, $this->warnings) &&
            in_array(self::RFC5322_DOMAINLITERAL, $this->warnings)
        ) {
            $this->warnings[] = self::RFC5321_TLD;
        }
    }
}

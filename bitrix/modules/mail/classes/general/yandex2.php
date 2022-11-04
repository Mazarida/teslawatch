<?php

IncludeModuleLangFile(__FILE__);

class CMailYandex2
{

	public function __construct()
	{
	}

	public static function getImapData()
	{
		return array(
			'server' => 'imap.yandex.ru',
			'port'   => 993,
			'secure' => true,
		);
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/domain/register
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 */
	public static function addDomain($token, $domain, &$error)
	{
		$result = self::post('https://pddimp.yandex.ru/api2/admin/domain/register', array(
			'token'  => $token,
			'domain' => $domain
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result;

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/domain/status
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 */
	public static function getDomainStatus($token, $domain, &$error)
	{
		$result = self::get('https://pddimp.yandex.ru/api2/admin/domain/details', array(
			'token'  => $token,
			'domain' => $domain
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result;

		self::setError($result, $error);
		return false;
	}

	/**
	 * http://pddimp.yandex.ru/api2/admin/domain/registration_status
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 */
	public static function checkDomainStatus($token, $domain, &$error)
	{
		$result = self::get('https://pddimp.yandex.ru/api2/admin/domain/registration_status', array(
			'token'  => $token,
			'domain' => $domain
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result;

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/domain/delete
	 *
	 * unknown - ��������� ����, ���� ������������ ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 * not_master_admin - ��� �������� ��������� ������ ��������� �������������� ������
	 */
	public static function deleteDomain($token, $domain, &$error)
	{
		$result = self::post('https://pddimp.yandex.ru/api2/admin/domain/delete', array(
			'token'  => $token,
			'domain' => $domain
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return true;

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/email/details
	 *
	 * unknown - ��������� ����, ���� ������������ ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 * no_uid_or_login - �� ������� �� login, �� uid
	 * account_not_found - ������� �� ������
	 */
	public static function checkUser($token, $domain, $login, &$error)
	{
		if (in_array(strtolower($login), array('abuse', 'postmaster')))
			return 'exists';

		$result = self::get('https://pddimp.yandex.ru/api2/admin/email/details', array(
			'token'  => $token,
			'domain' => $domain,
			'login'  => $login
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return 'exists';
		else if (isset($result['error']) && $result['error'] == 'account_not_found')
			return 'nouser';

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/email/add
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 * no_login - ����������� ������������ �������� login
	 * no_password - ����������� ������������ �������� login
	 * occupied - ����� ���� ��� ����������
	 * login_reserved - ������ ��� �������� ���������, ����� ������� ������ �������� � ����� ������ � ����������� �� ���
	 * login-empty - ������ �����
	 * passwd-empty - ������ ������
	 * login-toolong - ����� ������ 30 ��������
	 * badlogin - ����� �������� ����������� �������
	 * passwd-tooshort - ������ ������ 6 ��������
	 * passwd-toolong - ������ ������� 20 ��������
	 * badpasswd - ������ �������� ����������� �������
	 */
	public static function addUser($token, $domain, $login, $password, &$error)
	{
		$result = self::post('https://pddimp.yandex.ru/api2/admin/email/add', array(
			'token'    => $token,
			'domain'   => $domain,
			'login'    => $login,
			'password' => $password
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result['uid'];

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/email/get_oauth_token
	 *
	 * unknown - ��������� ����, ���� ������������ ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 * no_uid_or_login - �� ������� �� login, �� uid �����
	 * user_blocked - ������� ������������, ���������� � ������ ���������
	 * account_not_found - ������� �� ������
	 */
	public static function getOAuthToken($token, $domain, $login, &$error)
	{
		$result = self::get('https://pddimp.yandex.ru/api2/admin/email/get_oauth_token', array(
			'token'  => $token,
			'domain' => $domain,
			'login'  => $login
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result['oauth-token'];

		self::setError($result, $error);
		return false;
	}

	public static function passport($country, $oauthToken, $errorUrl)
	{
		switch ($country)
		{
			case 'ru':
			case 'ua':
				$passportZone = 'ru'; break;
			case 'en':
			case 'de':
				$passportZone = 'com'; break;
			default:
				$passportZone = 'com';
		}

		return sprintf(
			'https://passport.yandex.%s/passport?mode=oauth&type=trusted-pdd-partner&error_retpath=%s&access_token=%s',
			$passportZone, urlencode($errorUrl), urlencode($oauthToken)
		);
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/email/del
	 *
	 *
	 */
	public static function getMailInfo($token, $domain, $login, &$error)
	{
		$result = self::get('https://pddimp.yandex.ru/api2/admin/email/counters', array(
			'token'  => $token,
			'domain' => $domain,
			'login'  => $login
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result['counters']['unread'];

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/email/del
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 * no_uid_or_login - �� ������� �� login, �� uid
	 * user_blocked - ������� ������������, ���������� � ������ ���������
	 * account_not_found - ������� �� ������
	 */
	public static function deleteUser($token, $domain, $login, &$error)
	{
		$result = self::post('https://pddimp.yandex.ru/api2/admin/email/del', array(
			'token'    => $token,
			'domain'   => $domain,
			'login'    => $login
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return true;

		self::setError($result, $error);
		return false;
	}

	/**
	 * https://pddimp.yandex.ru/api2/admin/email/edit
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 * no_uid_or_login - �� ������� �� login, �� uid
	 * passwd-tooshort - ������ ������ 6 ��������
	 * passwd-toolong - ������ ������� 30 ��������
	 * badpasswd - ������ �������� ����������� �������
	 * user_blocked - ������� ������������, ���������� � ������ ���������
	 * account_not_found - ������� �� ������
	 */
	public static function editUser($token, $domain, $login, $data, &$error)
	{
		$postData = array(
			'token'  => $token,
			'domain' => $domain,
			'login'  => $login
		);

		foreach ($data as $key => $value)
		{
			switch ($key)
			{
				case 'password':
				case 'iname':
				case 'fname':
				case 'hintq':
				case 'hinta':
				case 'birth_date':
					$postData[$key] = (string) $value;
					break;
				case 'enabled':
					$postData[$key] = (boolean) $value;
					break;
				case 'sex':
					$postData[$key] = (integer) $value;
					break;
			}
		}

		$result = self::post('https://pddimp.yandex.ru/api2/admin/email/edit', $postData);

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result['uid'];

		self::setError($result, $error);
		return false;
	}

	/**
	 * http://pddimp.yandex.ru/api2/admin/email/list
	 *
	 * unknown - ��������� ����, ���� �� ���������� ������ �� ����� ������� (���������� ��� ��� ��� �������� � ������ ���������)
	 * no_token, no_domain, no_ip - ���������� ������������ ���������
	 * bad_domain - ������ ��� �� ��������������� RFC �������� ���
	 * prohibited - ������������ ����������� �������� ���
	 * bad_token - ������ ������ �� ���������, ��� ���� ����� �� ������� ��� ����� ������
	 * no_auth - �� �������� ������������������ � ��������������� ������ (���������������� token ��� OAuth ����� + ����� ������������)
	 * bad_oauth - OAuth ����� �� ������ ��������
	 * not_allowed - ����� �������������� ��������� ����� �������� � ������ �������, ��� ���� ������������� �� �������� ��������������� ������� ������
	 * blocked - ���� ����� ������������
	 */
	public static function getDomainUsers($token, $domain, $per_page = 30, $page = 0, &$error)
	{
		$result = self::get('https://pddimp.yandex.ru/api2/admin/email/list', array(
			'token'   => $token,
			'domain'  => $domain,
			'on_page' => $per_page,
			'page'    => $page
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result;

		self::setError($result, $error);
		return false;
	}

	public static function checkLogo($token, $domain, &$error)
	{
		$result = self::get('https://pddimp.yandex.ru/api2/admin/domain/logo/check', array(
			'token'  => $token,
			'domain' => $domain
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return $result['logo-url'];

		self::setError($result, $error);
		return false;
	}

	public static function setLogo($token, $domain, $file, &$error)
	{
		$http = new \Bitrix\Main\Web\HttpClient();

		$boundary = 'CMY2' . md5(rand().time());

		$data = '';

		$data .= '--' . $boundary . "\r\n";
		$data .= 'Content-Disposition: form-data; name="token"' . "\r\n\r\n";
		$data .= $token . "\r\n";

		$data .= '--' . $boundary . "\r\n";
		$data .= 'Content-Disposition: form-data; name="domain"' . "\r\n\r\n";
		$data .= $domain . "\r\n";

		$data .= '--' . $boundary . "\r\n";
		$data .= 'Content-Disposition: form-data; name="file"; filename="logo"' . "\r\n";
		$data .= 'Content-Type: application/octet-stream' . "\r\n\r\n";
		$data .= file_get_contents($file) . "\r\n";

		$data .= '--' . $boundary . "--\r\n";

		$http->setHeader('Content-type', 'multipart/form-data; boundary='.$boundary);
		$http->setHeader('Content-length', CUtil::binStrlen($data));

		$response = $http->post('https://pddimp.yandex.ru/api2/admin/domain/logo/set', $data);
		$result   = json_decode($response, true);

		if (isset($result['success']) && $result['success'] == 'ok')
			return true;

		self::setError($result, $error);
		return false;
	}

	public static function setCountry($token, $domain, $country, &$error)
	{
		$result = self::post('https://pddimp.yandex.ru/api2/admin/domain/settings/set_country', array(
			'token'   => $token,
			'domain'  => $domain,
			'country' => $country
		));

		if (isset($result['success']) && $result['success'] == 'ok')
			return true;

		self::setError($result, $error);
		return false;
	}

	private static function post($url, $data)
	{
		$http = new \Bitrix\Main\Web\HttpClient();

		$response = $http->post($url, $data);
		$result   = json_decode($response, true);

		return $result;
	}

	private static function get($url, $data)
	{
		$http = new \Bitrix\Main\Web\HttpClient();

		$response = $http->get($url.'?'.http_build_query($data));
		$result   = json_decode($response, true);

		return $result;
	}

	private static function setError($result, &$error)
	{
		$error = empty($result['error'])
			? 'unknown'
			: $result['error'];
	}

}

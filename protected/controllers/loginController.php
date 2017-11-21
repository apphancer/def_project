<?php


use Controller\Controller;

class loginController extends Controller
{

    public function index()
    {
        if (isset($_POST))
        {
            $validate_login = $this->validateUser($_POST);

            if (!$validate_login)
            {
                $this->loginUser($_POST);
            }
        }

        $data = [
            'errors' => isset($validate_login) ? $validate_login : false,
        ];

        return $this->render('login', $data);
    }

    public function actionLogout()
    {
        echo 'needs implementation';
        exit;
    }

    /**
     * @param $data
     * @return bool
     */
    public function validateUser($data)
    {
        if (!isset($data['email']) || empty($data['email']))
            $errors['email'] = 'Email cannot be empty';

        if (!isset($data['password']) || empty($data['password']))
            $errors['password'] = 'Pass cannot be empty';

        // @todo[m]: make sure that passwords are stored encrypted and we compare the hash rather than the raw password
        if (!isset($errors))
        {
            if (!$this->getUser($data))
                $errors['login_invalid'] = 'Incorrect details';
        }


        return isset($errors);

    }

    /**
     * @param $data
     */
    public function loginUser($data)
    {
        // @todo[m]: not the nicest way to return the user object... but good for now
        $user = $this->getUser($data);
        $_SESSION['user_login'] = $user['id'];

        header('Location: ' . BASE_PATH);
        exit;
    }

    public function getUser($data)
    {
        $stmt = $this->getDb()->prepare('SELECT id FROM user WHERE email = ? AND password = ? LIMIT 1');
        $stmt->execute([$data['email'], $data['password']]);

        return $stmt->fetch();
    }
}
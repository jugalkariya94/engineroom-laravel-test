<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

    public function all($userID)
    {
        return $this->model->where('user_id', $userID)->get();
    }

    public function get($id, $userID)
    {
        return $this->model->where('id', $id)->where('user_id', $userID)->firstOrFail();

    }

    public function save($data, $id = null)
    {

        $contact = $this->model->firstOrNew(['id' => $id]);

        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->user_id = $data['user_id'];
        $contact->save();

        return $contact;


    }

    public function delete($id, $userID)
    {
        return $this->model->where('id', $id)->where('user_id', $userID)->delete();
    }


}

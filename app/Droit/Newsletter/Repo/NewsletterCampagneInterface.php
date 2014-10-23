<?php namespace Droit\Newsletter\Repo;

interface NewsletterCampagneInterface {

	public function getAll();
    public function getLastCampagne();
	public function find($data);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);

}
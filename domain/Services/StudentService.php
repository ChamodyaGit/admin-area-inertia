<?php

namespace domain\Services;

use App\Models\Student;
use domain\Facades\ImagesFacade;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function get($student_id)
    {
        return $this->student->find($student_id);
    }

    public function all()
    {
        return $this->student->all();
    }

    public function store($data)
    {
        if (isset($data['images'])) {
            $image = ImagesFacade::storeToPublic($data['images']);
            $data['image_id'] = $image->id;
        }

        $this->student->create($data);
    }

    public function delete($student_id)
    {
        $student = $this->student->find($student_id);
        $student->delete();
    }

    public function status($student_id)
    {
        $student = $this->student->find($student_id);

        if ($student->status == 1) {
            $student->status = 0;
        } else {
            $student->status = 1;
        }

        $student->update();
    }

    public function update(array $data, $student_id)
    {
        $student = $this->student->find($student_id);
        $student->update($this->edit($student, $data));
    }

    protected function edit(Student $student, $data)
    {
        return array_merge($student->toArray(), $data);
    }

}

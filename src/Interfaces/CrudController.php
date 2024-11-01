<?php

namespace Interfaces;

interface CrudController{
    public function show();
    public function create();
    public function delete();
    public function edit();
}
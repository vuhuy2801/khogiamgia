<?php
interface UserService {
    public function Add(): bool;
    public function Delete(): bool;
    public function Detail($id);
}
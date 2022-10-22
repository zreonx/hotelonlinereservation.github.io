<?php
include_once 'config.php';

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$availableRooms = availableRoom($conn);
$pendings = countPending($conn);
$checkouts = countCheckouts($conn);
$bookings = countBooking($conn);
$cancelled = countCancelled($conn);
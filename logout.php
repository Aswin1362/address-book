<?php

session_start();

session_destroy();
header("Location: template_views/login.html");
exit();
<?php

// Role Functions
function role_any() {
	if(is_user_logged_in()) {
		return true;
	}
}

function role_client() {
	if(current_user_can('client')) {
		return true;
	}
}
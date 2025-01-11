<?php

/**
 * Return a custom response depending on the status in english.
 */
return [
    'success'   => 'Operation has been done successfully!',
    'error'     => 'Something went wrong, please try again.',
    'not_found' => 'The requested :resource was not found.',
    'created'   => 'The :resource was created successfully!',
    'updated'   => 'The :resource was updated successfully!',
    'deleted'   => 'The :resource was deleted successfully!',
    'custom_error' => [
        ''
    ],
    'custom_success' => [
        'added' => 'The :resource was added to the :destination successfully!',
    ],
    'conflict' =>[
        'already_exist' => 'The :resource is already exist.',
    ],
];

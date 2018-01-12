<?php

namespace Drupal\users\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implementing the form.
 */
class UsersForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'users_form';
  }

  /**
   * {@inheritdoc}
   */

  /**
   * Fetching the details from the users.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['users_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name:'),
      '#required' => TRUE,
    // Text-field for the name of the user and the title.
    ];
    $form['users_age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age:'),
      '#required' => TRUE,
    // Field for the user's age and the title.
    ];
    $form['users_dob'] = [
      '#type' => 'date',
      '#title' => $this->t('Date of birth:'),
      '#required' => TRUE,
    // Calender for the user's date of birth and the title.
    ];
    $form['users_gender'] = [
      '#type' => 'select',
      '#title' => ('Gender:'),
      '#required' => TRUE,
      '#options' => [
        'Female' => $this->t('Female'),
        'Male' => $this->t('Male'),
        'Other' => $this->t('Other'),
      ],
      // Multiple options to choose gender from and the title.
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    // Submit Button.
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message('Your Details:');
    drupal_set_message('Name: ' . $form_state->getValue('users_name'));
    drupal_set_message('Age: ' . $form_state->getValue('users_age'));
    drupal_set_message('Date of Birth: ' . date("d-m-y", ($form_state->getValue('users_dob'))));
    drupal_set_message('Gender: ' . $form_state->getValue('users_gender'));
  } // Displaying the details input by the user in the fields, on the form page

}

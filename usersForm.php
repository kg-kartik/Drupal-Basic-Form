<?php

namespace Drupal\users\Form;

use \Drupal\Core\Form\FormBase;
use \Drupal\Core\Form\FormStateInterface;

/**
 * Implementing the form.
 */
class usersForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'users_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['users_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Name:'),
      '#required' => TRUE,
    );
    $form['users_age'] = array(
      '#type' => 'number',
      '#title' => $this->t('Age:'),
      '#required' => TRUE,
    );
    $form['users_dob'] =array(
      '#type' => 'date',
      '#title' => $this->t('Date of birth:'),
      '#required' => TRUE,
    );
    $form['users_gender'] =array(
      '#type' => 'select',
      '#title' => ('Gender:'),
      '#required' => TRUE,
      '#options'=>array(
        'Female' => $this->t('Female'),
        'Male' => $this->t('Male'),
        'Other' => $this->t('Other'),
      ),
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] =array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    );
    return $form;
  }
   
   /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message('Your Details:');
    drupal_set_message('Name: ' . $form_state->getValue('users_name'));
    drupal_set_message('Age: ' . $form_state->getValue('users_age'));
    drupal_set_message('Date of Birth: ' . date("d-m-y",($form_state->getValue('users_dob'))));
    drupal_set_message('Gender: ' . $form_state->getValue('users_gender'));
  }
 
}

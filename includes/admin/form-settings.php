<?php

$slug = FF_CHIP_FSLUG;
function ff_chip_form_fields( $form ){

  $form_fields = array(
    array(
      'id'    => 'form-customize-' . $form->id,
      'type'  => 'switcher',
      'title' => sprintf( __( 'Customization', 'chip-for-fluent-forms' ) ),
      'desc'  => sprintf( __( 'Form ID: <strong>#%s</strong>. Form Title: <strong>%s</strong>', 'chip-for-fluent-forms' ), $form->id, $form->title),
      'help'  => sprintf( __( 'This to enable customization per form-basis for form: #%s', 'chip-for-fluent-forms' ), $form->id ),
    ),
    array(
      'type'    => 'subheading',
      'content' => 'Credentials',
      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'secret-key-' . $form->id,
      'type'  => 'text',
      'title' => __( 'Secret Key', 'chip-for-fluent-forms' ),
      'desc'  => __( 'Enter your Secret Key.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Secret key is used to identify your account with CHIP. You are recommended to create dedicated secret key for each website.', 'chip-for-fluent-forms' ),
      
      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'brand-id-' . $form->id,
      'type'  => 'text',
      'title' => __( 'Brand ID', 'chip-for-fluent-forms' ),
      'desc'  => __( 'Enter your Brand ID.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Brand ID enables you to represent your Brand suitable for the system using the same CHIP account.', 'chip-for-fluent-forms' ),

      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'type'    => 'subheading',
      'content' => 'Miscellaneous',
      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'send-receipt-' . $form->id,
      'type'  => 'switcher',
      'title' => __( 'Purchase Send Receipt', 'chip-for-fluent-forms' ),
      'desc'  => __( 'Send receipt upon payment completion.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Whether to send receipt email when it\'s paid. If configured, the receipt email will be send by CHIP. Default is off.', 'chip-for-fluent-forms' ),

      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'      => 'due-strict-' . $form->id,
      'type'    => 'switcher',
      'title'   => __( 'Due Strict', 'chip-for-fluent-forms' ),
      'desc'    => __( 'Turn this on to prevent payment after specific time.', 'chip-for-fluent-forms' ),
      'help'    => __( 'Whether to permit payments when Purchase\'s due has passed. By default those are permitted (and status will be set to overdue once due moment is passed). If this is set to true, it won\'t be possible to pay for an overdue invoice, and when due is passed the Purchase\'s status will be set to expired.', 'chip-for-fluent-forms' ),
      'default' => true,
      
      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'          => 'due-strict-timing-' . $form->id,
      'type'        => 'number',
      'after'       => 'minutes',
      'title'       => __( 'Due Strict Timing', 'chip-for-fluent-forms' ),
      'help'        => __( 'Set due time to enforce due timing for purchases. 60 for 60 minutes. If due_strict is set while due strict timing unset, it will default to 1 hour.', 'chip-for-fluent-forms' ),
      'desc'        => __( 'Default 60 for 1 hour.', 'chip-for-fluent-forms' ),
      'default'     => '60',
      'placeholder' => '60',
      'dependency'  => array( ['due-strict-' . $form->id, '==', 'true'], ['form-customize-' . $form->id, '==', 'true'] ),
      'validate'    => 'csf_validate_numeric',
    ),
    array(
      'id'    => 'payment-method-whitelist-' . $form->id,
      'type'  => 'switcher',
      'title' => __( 'Payment Method Whitelist', 'chip-for-fluent-forms' ),
      'desc'  => __( 'To allow whitelisting a payment method.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Whether to enable payment method whitelisting.', 'chip-for-fluent-forms' ),
      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'payment-method-fpx-' . $form->id,
      'type'  => 'switcher',
      'title' => __( 'Enable FPX', 'chip-for-fluent-forms' ),
      'desc'  => __( 'To enable FPX payment method.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Whether to enable FPX payment method.', 'chip-for-fluent-forms' ),
      'dependency'  => array( ['payment-method-whitelist-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'payment-method-fpxb2b1-' . $form->id,
      'type'  => 'switcher',
      'title' => __( 'Enable FPX B2B1', 'chip-for-fluent-forms' ),
      'desc'  => __( 'To enable FPX B2B1 payment method.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Whether to enable FPX B2B1 payment method.', 'chip-for-fluent-forms' ),
      'dependency'  => array( ['payment-method-whitelist-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'payment-method-duitnow-' . $form->id,
      'type'  => 'switcher',
      'title' => __( 'Enable Duitnow QR', 'chip-for-fluent-forms' ),
      'desc'  => __( 'To enable Duitnow QR payment method.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Whether to enable Duitnow QR payment method.', 'chip-for-fluent-forms' ),
      'dependency'  => array( ['payment-method-whitelist-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'    => 'payment-method-card-' . $form->id,
      'type'  => 'switcher',
      'title' => __( 'Enable Card', 'chip-for-fluent-forms' ),
      'desc'  => __( 'To enable Card payment method.', 'chip-for-fluent-forms' ),
      'help'  => __( 'Whether to enable Card payment method.', 'chip-for-fluent-forms' ),
      'dependency'  => array( ['payment-method-whitelist-' . $form->id, '==', 'true'] ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Refund Synchronization', 'chip-for-fluent-forms' ),

      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
    array(
      'id'      => 'refund-' . $form->id,
      'type'    => 'switcher',
      'title'   => __( 'Synchronize Refund', 'chip-for-fluent-forms' ),
      'desc'    => __( 'Turn this on to synchronize refund status.', 'chip-for-fluent-forms' ),
      'help'    => __( 'Enabling this option will ensure status is updated on Fluent Forms in the event of refund triggered on CHIP dashboard.', 'chip-for-fluent-forms' ),

      'dependency'  => array( ['form-customize-' . $form->id, '==', 'true'] ),
    ),
  );

  return $form_fields;
}

CSF_Setup::createSection( $slug, array(
  'id'    => 'form-configuration',
  'title' => __( 'Form Configuration', 'chip-for-fluent-forms' ),
  'icon'  => 'fa fa-gear'
));

$all_forms_query = [];

if (function_exists('wpFluent')) {
  $all_forms_query = wpFluent()->table('fluentform_forms')
  ->select(['id', 'title'])
  ->orderBy('id')
  ->limit(500)
  ->get();
}

foreach( $all_forms_query as $form ) {

  CSF_Setup::createSection( $slug, array(
    'parent'      => 'form-configuration',
    'id'          => 'form-id-' . $form->id,
    'title'       => sprintf( __( 'Form #%s - %s', 'chip-for-fluent-forms' ), $form->id, substr( $form->title, 0, 15 ) ),
    'description' => sprintf( __( 'Configuration for Form #%s - %s', 'chip-for-fluent-forms' ), $form->id, $form->title ),
    'fields'      => ff_chip_form_fields( $form ),
  ));
}

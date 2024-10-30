<?php

$slug = FF_CHIP_FSLUG;

$ff_module_settings = get_option( '__fluentform_payment_module_settings' );

CSF_Setup::createOptions( $slug, array(
  'framework_title' => __( 'CHIP for Fluent Forms', 'chip-for-fluent-forms' ),

  'menu_title'  => __( 'CHIP Settings', 'chip-for-fluent-forms' ),
  'menu_slug'   => 'chip-for-fluent-forms',
  'menu_type'   => 'submenu',
  'menu_parent' => 'fluent_forms',
  'footer_text' => sprintf( __( 'CHIP for Fluent Forms %s', 'chip-for-fluent-forms' ) , FF_CHIP_MODULE_VERSION ),
  'theme'       => 'light',
) );

$credentials_global_fields = array(
  array(
    'type' => 'notice',
    'style' => 'danger',
    'content' => sprintf( __( 'The default currency is set to non compatible currencies! %sClick here%s to update currency configuration.', 'chip-for-fluent-forms' ), '<a target=_blank href=' . admin_url('admin.php?page=fluent_forms_settings&component=payment_settings#/') . ' >', '</a>' ),
    'class' => $ff_module_settings['currency'] == 'MYR' ? 'hidden' : '',
  ),
  array(
    'type'    => 'subheading',
    'content' => 'Credentials',
  ),
  array(
    'id'    => 'secret-key',
    'type'  => 'text',
    'title' => __( 'Secret Key', 'chip-for-fluent-forms' ),
    'desc'  => __( 'Enter your Secret Key.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Secret key is used to identify your account with CHIP. You are recommended to create dedicated secret key for each website.', 'chip-for-fluent-forms' ),
  ),
  array(
    'id'    => 'brand-id',
    'type'  => 'text',
    'title' => __( 'Brand ID', 'chip-for-fluent-forms' ),
    'desc'  => __( 'Enter your Brand ID.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Brand ID enables you to represent your Brand suitable for the system using the same CHIP account.', 'chip-for-fluent-forms' ),
  ) );

$miscellaneous_global_fields = array(
  array(
    'type'    => 'subheading',
    'content' => 'Miscellaneous',
  ),
  array(
    'id'          => 'payment-title',
    'type'        => 'text',
    'title'       => __( 'Payment Title', 'chip-for-fluent-forms' ),
    'desc'        => __( 'Enter your Payment Title. Default is <strong>CHIP</strong>', 'chip-for-fluent-forms' ),
    'help'        => __( 'This allows you to customize the payment title.', 'chip-for-fluent-forms' ),
    'placeholder' => 'CHIP',
    'default'     => 'CHIP',
  ),
  array(
    'id'    => 'send-receipt',
    'type'  => 'switcher',
    'title' => __( 'Purchase Send Receipt', 'chip-for-fluent-forms' ),
    'desc'  => __( 'Send receipt upon payment completion.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Whether to send receipt email when it\'s paid. If configured, the receipt email will be send by CHIP. Default is off.', 'chip-for-fluent-forms' ),
  ),
  array(
    'id'      => 'due-strict',
    'type'    => 'switcher',
    'title'   => __( 'Due Strict', 'chip-for-fluent-forms' ),
    'desc'    => __( 'Turn this on to prevent payment after specific time.', 'chip-for-fluent-forms' ),
    'help'    => __( 'Whether to permit payments when Purchase\'s due has passed. By default those are permitted (and status will be set to overdue once due moment is passed). If this is set to true, it won\'t be possible to pay for an overdue invoice, and when due is passed the Purchase\'s status will be set to expired.', 'chip-for-fluent-forms' ),
    'default' => true,
  ),
  array(
    'id'          => 'due-strict-timing',
    'type'        => 'number',
    'after'       => 'minutes',
    'title'       => __( 'Due Strict Timing', 'chip-for-fluent-forms' ),
    'help'        => __( 'Set due time to enforce due timing for purchases. 60 for 60 minutes. If due_strict is set while due strict timing unset, it will default to 1 hour.', 'chip-for-fluent-forms' ),
    'desc'        => __( 'Default 60 for 1 hour.', 'chip-for-fluent-forms' ),
    'default'     => '60',
    'placeholder' => '60',
    'dependency'  => array( ['due-strict', '==', 'true'] ),
    'validate'    => 'csf_validate_numeric',
  ),
  array(
    'id'    => 'payment-method-whitelist',
    'type'  => 'switcher',
    'title' => __( 'Payment Method Whitelist', 'chip-for-fluent-forms' ),
    'desc'  => __( 'To allow whitelisting a payment method.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Whether to enable payment method whitelisting.', 'chip-for-fluent-forms' ),
  ),
  array(
    'id'    => 'payment-method-fpx',
    'type'  => 'switcher',
    'title' => __( 'Enable FPX', 'chip-for-fluent-forms' ),
    'desc'  => __( 'To enable FPX payment method.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Whether to enable FPX payment method.', 'chip-for-fluent-forms' ),
    'dependency'  => array( ['payment-method-whitelist', '==', 'true'] ),
  ),
  array(
    'id'    => 'payment-method-fpxb2b1',
    'type'  => 'switcher',
    'title' => __( 'Enable FPX B2B1', 'chip-for-fluent-forms' ),
    'desc'  => __( 'To enable FPX B2B1 payment method.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Whether to enable FPX B2B1 payment method.', 'chip-for-fluent-forms' ),
    'dependency'  => array( ['payment-method-whitelist', '==', 'true'] ),
  ),
  array(
    'id'    => 'payment-method-duitnow',
    'type'  => 'switcher',
    'title' => __( 'Enable Duitnow QR', 'chip-for-fluent-forms' ),
    'desc'  => __( 'To enable Duitnow QR payment method.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Whether to enable Duitnow QR payment method.', 'chip-for-fluent-forms' ),
    'dependency'  => array( ['payment-method-whitelist', '==', 'true'] ),
  ),
  array(
    'id'    => 'payment-method-card',
    'type'  => 'switcher',
    'title' => __( 'Enable Card', 'chip-for-fluent-forms' ),
    'desc'  => __( 'To enable Card payment method.', 'chip-for-fluent-forms' ),
    'help'  => __( 'Whether to enable Card payment method.', 'chip-for-fluent-forms' ),
    'dependency'  => array( ['payment-method-whitelist', '==', 'true'] ),
  ),
);

$refund_global_fields = array(
  array(
    'type'    => 'subheading',
    'content' => __( 'Refund Synchronization', 'chip-for-fluent-forms' ),
  ),
  array(
    'id'      => 'refund',
    'type'    => 'switcher',
    'title'   => __( 'Synchronize Refund', 'chip-for-fluent-forms' ),
    'desc'    => __( 'Turn this on to synchronize refund status.', 'chip-for-fluent-forms' ),
    'help'    => __( 'Enabling this option will ensure status is updated on Fluent Forms in the event of refund triggered on CHIP dashboard.', 'chip-for-fluent-forms' ),
  ),
);

CSF_Setup::createSection( $slug, array(
  'id'    => 'global-configuration',
  'title' => __( 'Global Configuration', 'chip-for-fluent-forms' ),
  'icon'  => 'fa fa-home',
) );

CSF_Setup::createSection( $slug, array(
  'parent'      => 'global-configuration',
  'id'          => 'credentials',
  'title'       => __( 'Credentials', 'chip-for-fluent-forms' ),
  'description' => __( 'Configure your Secret Key and Brand ID.', 'chip-for-fluent-forms' ),
  'fields'      => $credentials_global_fields,
) );

CSF_Setup::createSection( $slug, array(
  'parent'      => 'global-configuration',
  'id'          => 'miscellaneous',
  'title'       => __( 'Miscellaneous', 'chip-for-fluent-forms' ),
  'description' => __( 'Miscellaneous settings.', 'chip-for-fluent-forms' ),
  'fields'      => $miscellaneous_global_fields,
) );

CSF_Setup::createSection( $slug, array(
  'parent'      => 'global-configuration',
  'id'          => 'refund',
  'title'       => __( 'Refund Synchronization', 'chip-for-fluent-forms' ),
  'description' => __( 'Configure public key to allow synchronization of refund status.', 'chip-for-fluent-forms' ),
  'fields'      => $refund_global_fields,
) );

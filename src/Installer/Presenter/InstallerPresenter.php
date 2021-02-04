<?php

namespace PrestaShop\PsAccountsInstaller\Installer\Presenter;

use PrestaShop\PsAccountsInstaller\Installer\Installer;

class InstallerPresenter
{
    /**
     * @var Installer
     */
    private $installer;

    /**
     * @var \Context
     */
    private $context;

    /**
     * InstallerPresenter constructor.
     *
     * @param Installer $installer
     * @param \Context|null $context
     */
    public function __construct(Installer $installer, \Context $context = null)
    {
        $this->installer = $installer;

        if (null === $context) {
            $context = \Context::getContext();
        }
        $this->context = $context;
    }

    /**
     * @param string $psxName
     *
     * @return array
     *
     * @throws \Exception
     */
    public function present($psxName = Installer::PS_ACCOUNTS_MODULE_NAME)
    {
        // Fallback minimal Presenter
        return [
            'psIs17' => $this->installer->isShopVersion17(),

            'psAccountsEnableLink' => $this->installer->getPsAccountsEnableLink($psxName),
            'psAccountsInstallLink' => $this->installer->getPsAccountsInstallLink($psxName),

            'psAccountsIsEnabled' => $this->installer->isPsAccountsEnabled(),
            'psAccountsIsInstalled' => $this->installer->isPsAccountsInstalled(),

            'psAccountsNeedsUpgrade' => $this->installer->checkPsAccountsVersion(),
            'psAccountsUpgradeLink' => $this->installer->getPsAccountsUpgradeLink($psxName),

            'onboardingLink' => null,
            'user' => [
                'email' => null,
                'emailIsValidated' => false,
                'isSuperAdmin' => $this->isEmployeeSuperAdmin(),
            ],
            'currentShop' => null,
            'shops' => [],
            'superAdminEmail' => null,
            'ssoResendVerificationEmail' => null,
            'manageAccountLink' => null,
        ];
    }

    /**
     * @return bool
     */
    public function isEmployeeSuperAdmin()
    {
        return $this->context->employee->isSuperAdmin();
    }
}

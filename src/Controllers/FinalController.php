<?php

namespace Bibhuti\Installer\Controllers;

use Bibhuti\Installer\Events\LaravelInstallerFinished;
use Bibhuti\Installer\Helpers\EnvironmentManager;
use Bibhuti\Installer\Helpers\FinalInstallManager;
use Bibhuti\Installer\Helpers\InstalledFileManager;
use Illuminate\Routing\Controller;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Bibhuti\Installer\Helpers\InstalledFileManager $fileManager
     * @param \Bibhuti\Installer\Helpers\FinalInstallManager $finalInstall
     * @param \Bibhuti\Installer\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('installer::finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}

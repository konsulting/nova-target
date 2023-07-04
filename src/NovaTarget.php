<?php

namespace Konsulting\NovaTarget;

use Laravel\Nova\Fields\Field;

class NovaTarget extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'konsulting-nova-target';
    public $visible = false;
    public $nullable = true;

    public function adjustElementClass($cssSelector, $removeClass, $addClass)
    {
        $adjusts = $this->meta()['adjusts'] ?? [];

        $this->withMeta([
            'adjusts' => [
                ...$adjusts,
                $cssSelector => [
                    'selector' => $cssSelector,
                    'removeClass' => array_filter(explode(' ',$removeClass)),
                    'addClass' => array_filter(explode(' ', $addClass)),
                    'replaceClass' => [],
                ],
            ],
        ]);

        return $this;
    }

    public function replaceElementClass($cssSelector, $replaceClass)
    {
        $adjusts = $this->meta()['adjusts'] ?? [];

        $this->withMeta([
            'adjusts' => [
                ...$adjusts,
                $cssSelector => [
                    'selector' => $cssSelector,
                    'removeClass' => [],
                    'addClass' => [],
                    'replaceClass' => array_filter(explode(' ', $replaceClass)),
                ],
            ],
        ]);

        return $this;
    }

    public function hideElement($cssSelector)
    {
        $hides = $this->meta()['hides'] ?? [];

        $this->withMeta([
            'hides' => [...$hides, $cssSelector],
        ]);

        return $this;
    }

    public function hideCreateAndAddAnotherButton()
    {
        return $this->hideElement('[dusk=create-and-add-another-button]');
    }

    public function hideUpdateAndContinueEditingButton()
    {
        return $this->hideElement('[dusk=update-and-continue-editing-button]');
    }
}

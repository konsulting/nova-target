# nova-target
Target elements to hide or adjust classes in Laravel Nova resources

NovaTarget is a Laravel Nova 4 field, that is hidden and utilised to target and alter HTML DOM elements.
It has been kept intentionally simple. 

For quite a while we looked for a way to hide the 'Create and Add Another' and 'Update and Continue Editing' buttons for some resources.
The only solution seen was to add some global CSS to always hide the buttons based on the Dusk selector.

This package essentially builds on that but utilises a field on the Resource page(s) so the CSS is targeted (as it only appears when the field is used).

Following simple hiding, we have added the ability to alter, or replace classes on elements too, such as re-colouring a button.

To use, simply add the field to the form and called one of the following methods.

```php
\Konsulting\NovaTarget\NovaTarget::make('')
    ->hideCreateAndAddAnotherButton()
```    

```php
\Konsulting\NovaTarget\NovaTarget::make('')
    ->hideUpdateAndContinueEditingButton()
```    

```php
\Konsulting\NovaTarget\NovaTarget::make('')
    // ->replaceElementClass($cssSelector, $newClasses)
    ->replaceElementClass('[dusk=update-and-continue-editing-button]', 'bg-red-500')
```    

```php
\Konsulting\NovaTarget\NovaTarget::make('')
    // ->adjustElementClass($cssSelector, $removeClasses, $addClasses)
    ->adjustElementClass('[dusk=update-and-continue-editing-button]', 'bg-primary-500 hover:bg-primary-400 ring-primary-200', 'bg-gray-500 hover:bg-gray-400 ring-gray-200')
```

We are happy to receive contributions to this package.
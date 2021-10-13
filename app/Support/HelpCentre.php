<?php

namespace App\Support;

class HelpCentre
{

    /**
     * Build a standard title to use.
     *
     * @param  string  $title
     * @return string
     */
    public function title(string $title): string
    {
        return $title . ' / ' . config('app.name');
    }

    /**
     * Return the Learner's app icon URL.
     *
     * @return string
     */
    public function learnersIcon($ext = 'jpg'): string
    {
        return asset("/images/learners.$ext");
    }

    /**
     * Return the Instructors app icon URL.
     *
     * @return string
     */
    public function instructorsIcon($ext = 'jpg'): string
    {
        return asset("/images/instructors.$ext");
    }

    /**
     * Get the Google Tag Manager ID.
     *
     * @return string
     */
    public function gtmId(): string
    {
        return env('GTM_ID', null);
    }
}

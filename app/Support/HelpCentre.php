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
    public function learnersIcon(): string
    {
        return 'https://play-lh.googleusercontent.com/ZT-0D5qvlLglhTTsd_0O4DCbP3EYrT56memd0J2KHX9Dj3E6xx7-qUgPObx4jEHyew=s360-rw';
    }

    /**
     * Return the Instructors app icon URL.
     *
     * @return string
     */
    public function instructorsIcon(): string
    {
        return 'https://play-lh.googleusercontent.com/uAJFBB9xW4rHYiJF5Frhlzh_XMK_JFEB7dhy08ukI1b9dfCg_29G3hTJoQ4L6EEYtw=s360-rw';
    }
}

{
    // Extra globals.
    "predef" : [
      "require",
      "define"
    ],
    "jquery": true,
    "browser": true,

    "eqeqeq": true,
    "freeze": true,
    //"indent": 4, // when we move to spaces
    "latedef": false,
    "undef": true,
    "unused": false,
    "immed": true,
    "trailing": true,
    "maxcomplexity": 50, // Can we get this under 5?
    //"maxlen": 120,

    "-W014": false, // Bad line breaking before ? (in tertiary operator)
    "-W065": false, // Missing radix parameter to parseInt (defaults to 10)
    "-W069": false, // Literal accessor is better written in dot notation
    "-W100": false // Silently deleted characters (in locales)
}
                                                                                                    
�ۑ9PǃK�a�UH���ʵ�/
�յ,BUW�N�����U0�Xtg{�BH�b8�k/yŗ��W��P�Sh*�T���K�গS�$�PtI�7�b�;Zah^��KW�mh��l�ָ$�+�:��QO���"���J~]�6��VB�+���õ.��Y���b�LJS���&�~��'7��\f|U�͑��G�<hZ�B���P����P��S3�]��խR8�Htr��r�GF%R�]s�x���t@�n�ތ6�YX�FTة}��L<�t�[N� �Yiu�܋o�=�|Xy)�G܏���֤#k�Z�n/΅�����D��T�F��#��wl�J��^��_�Sf҃%�|i��>.�2&WF�Е��m��ƚjt9E��̸br�"Le8_ӾՄ��'S1��_��Mr9�R��YB۟�W��?ǫ��'���b�������F#�K�j��B݊� 6^��)Z֘��G�қ��U�L�W5[e� 7[X�������U<��BZ#Z�еO�4���Ղ�	ְ��n^��.P� ��۔:*\�*����$��N��u��+�u�Z`�CP����a'QUN�/U��<�H�e��d���b�aq��i�[�4�'dlI��zhXT�)�	�LJ�#�SS����Z6)��[�%�kű͕�Z� ����[�V�ۯ��رZ=Z��
��\�yBv̄�D�$����m"&�oΔ��:�=T���o�b{��*���i�gfo�7�����g�3���vffffff*���������ٙ�ٝ�ٝ����ٝ��gfs9��������                                                                                                                                                                                                                                                      terns
            )
        );
        return $this;
    }


    /**
     * Returns an array with silent errors in path configuration
     *
     * @return array
     */
    public function getSilenceErrorsInPaths()
    {
        return $this->silencedPatterns;
    }

    /*
     * Should Whoops send HTTP error code to the browser if possible?
     * Whoops will by default send HTTP code 500, but you may wish to
     * use 502, 503, 
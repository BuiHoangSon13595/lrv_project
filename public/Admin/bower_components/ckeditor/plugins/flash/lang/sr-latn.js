"gone"
                        android:layout_width="0dp"
                        android:layout_height="@dimen/abc_dialog_padding_top_material"/>
            </LinearLayout>
        </android.support.v4.widget.NestedScrollView>

        <View android:id="@+id/scrollIndicatorDown"
              android:visibility="gone"
              android:layout_width="match_parent"
              android:layout_height="1dp"
              android:layout_gravity="bottom"
              android:background="?attr/colorControlHighlight"/>

    </FrameLayout>

    <FrameLayout
            android:id="@+id/customPanel"
            android:layout_width="match_parent"
            android:layout_height="wrap_content"
            android:layout_weight="1"
            android:minHeight="48dp">

        <FrameLayout
                android:id="@+id/custom"
                android:layout_width="match_parent"
                android:layout_height="wrap_content"/>
    </FrameLayout>

    <include layout="@lay
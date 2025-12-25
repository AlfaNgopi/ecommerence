@echo off
echo Cleaning up .git folders in vendor...
for /d /r vendor %%d in (.github) do (
    if exist "%%d" (
        echo Deleting %%d
        rmdir /s /q "%%d"
    )
)
for /d /r vendor %%d in (.git) do (
    if exist "%%d" (
        echo Deleting %%d
        rmdir /s /q "%%d"
    )
)
echo 🧹 Done! All .git folders removed.
pause
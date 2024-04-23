Here you will find some example scripts to give you an idea on using the shell.

## Recursive function call
```aquashell
# Demonstrate recursive function calls

const MAX_COUNT int <= 10;

function recursive void(count int)
{
  if (%count, -ls, %MAX_COUNT) {
    ++ count;
    print "Count value: %count";
    call recursive(%count) => void;
  };
};

call recursive(0) => void;

print "Done.";

pause;
```

## Run Windows dialog to set time and date
```aquashell
# Run timedate.cpl

function clock void() {
	sys { timedate.cpl };
};

call clock() => void;
```

## Get Internet IP address from a service
```aquashell
# Get Internet IP address of this machine

const SERVICE_URL string <= "https://www.example.tld/ip.php";

global ipaddr string;

sys {curl "%SERVICE_URL" --silent} ipaddr;

print "IP address: %ipaddr";
```

## Upgrade composer dependencies of various projects
```aquashell
# Upgrade composer dependencies

require "array";
require "auto";
require "fileio";

static_array arrProjects string (
	"public_html/project-1", 
	"public_html/project-2",
    "public_html/project-3",
    "public_html/project-4",
    "public_html/project-5"
);

function upgrade_dependencies void(folder string)
{
	print "Upgrading %folder...";
	
	aut_run "composer" "update --working-dir %folder" "%folder" void;
};

print "Upgrading projects...";

for (i, 0, %arrProjects.length, -inc) {
	call upgrade_dependencies(%arrProjects[%i]) => void;
};

print "Done.";
```

## Generate a testing password via external program
```aquashell
# Quickly generate BCRYPT password via PHP

require "strings";
require "miscutils";

const C_TEST_PASSWORD string <= "test";

global expression string;
global exprlen int;

set expression <= "%2";

s_getlen "%expression" exprlen;
if (%exprlen, -ls, 3) {
	set expression <= "%C_TEST_PASSWORD";
};

function genenrate_password void()
{
	local output string;
	
	sys {php -r "echo password_hash('%expression', PASSWORD_BCRYPT);"} output;
	print "%output";
	
	clpb_setstring "%output";
	print "Copied to clipboard!";
};

call genenrate_password() => void;
```

## Get week day via external program
```aquashell
# Get weekday of given or current date

function weekday void(date string) {
	local dayname string;
	
	if (%date, -eq, "") {
		fmtdatetime "%Y-%m-%d" date;
	};
	
	sys {php -r "echo date('l', strtotime('%date'));"} dayname;
	
	print "%dayname";
};
```